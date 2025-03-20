<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::paginate(10);
        return view('reservations.index', compact('reservations'));
    }
    // عرض صفحة الحجز
    public function create()
    {
        $tables = Table::where('status', 'available')->get(); // جلب الطاولات المتاحة فقط
        return view('client.reservation', compact('tables'));
    }

    // تخزين بيانات الحجز
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/^\d{10,15}$/',
            'table_id' => 'required|exists:tables,id',
            'date' => 'required|date',
            'time' => 'required',
            'guests' => 'required|integer|min:1',
            'special_request' => 'nullable|string',
        ]);
    
        // حساب وقت انتهاء الحجز (بعد ساعة)
        $startTime = $request->time;
        $endTime = date('H:i', strtotime($startTime . ' +1 hour'));
    
        // البحث عن حجز متداخل
        $existingReservation = Reservation::where('table_id', $request->table_id)
            ->where('date', $request->date)
            ->where(function ($query) use ($startTime, $endTime) {
                $query->whereBetween('time', [$startTime, $endTime])
                      ->orWhereBetween(\DB::raw("ADDTIME(time, '1:00:00')"), [$startTime, $endTime]);
            })
            ->first(); // نستخدم first() عشان نجيب الحجز الأول المتداخل
    
        if ($existingReservation) {
            // استخراج وقت بداية ونهاية الحجز الحالي بتنسيق 12 ساعة
            $reservedStartTime = date('h:i A', strtotime($existingReservation->time));
            $reservedEndTime = date('h:i A', strtotime($existingReservation->time . ' +1 hour'));
    
            return redirect()->back()->with('error', "هذه الترابيزة محجوزة بالفعل من الساعة $reservedStartTime حتى الساعة $reservedEndTime.");
        }
    
        // حفظ الحجز
        Reservation::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'table_id' => $request->table_id,
            'date' => $request->date,
            'time' => $request->time,
            'guests' => $request->guests,
            'special_request' => $request->special_request,
        ]);
    
        return redirect()->back()->with('success', 'تم الحجز بنجاح!');
    }
    

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return redirect()->back()->with('success', 'تم حذف الحجز بنجاح!');
    }
}
