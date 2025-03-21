<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Support\Facades\DB;

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
        $tables = Table::with('reservations')->get(); // جلب جميع الترابيزات مع الحجوزات 
        return view('client.reservation', compact('tables'));
    }

    // تخزين بيانات الحجز
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|regex:/^\d{10,15}$/',
            'table_id' => 'required|exists:tables,id',
            'date' => 'required|date',
            'time' => 'required',
            'guests' => 'required|integer|min:1',
            'special_request' => 'nullable|string',
        ]);
    
        // حساب وقت انتهاء الحجز (مدة ساعة)
        $endTime = date('H:i', strtotime($request->time . ' +1 hour'));
    
        // البحث عن أي حجز متعارض
        $existingReservation = Reservation::where('table_id', $request->table_id)
            ->where('date', $request->date)
            ->where(function ($query) use ($request, $endTime) {
                $query->whereBetween('time', [$request->time, $endTime])
                      ->orWhereBetween(DB::raw("ADDTIME(time, '1:00:00')"), [$request->time, $endTime]);
            })
            ->first(); // جلب بيانات الحجز بدلاً من التحقق فقط من وجوده
    
        if ($existingReservation) {
            // تحويل وقت الحجز إلى تنسيق 12 ساعة
            $reservedStartTime = date('h:i A', strtotime($existingReservation->time));
            $reservedEndTime = date('h:i A', strtotime($existingReservation->time . ' +1 hour'));
    
            return redirect()->back()->with('error', "هذه الترابيزة محجوزة من $reservedStartTime إلى $reservedEndTime.");
        }
    
        // إنشاء الحجز الجديد
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
        
        // تحديث حالة الترابيزة إلى "Available" عند حذف الحجز
        Table::where('id', $reservation->table_id)->update(['status' => 'Available']);
    
        $reservation->delete();
        return redirect()->back()->with('success', 'تم حذف الحجز بنجاح!');
    }
}
    

//     public function destroy($id)
//     {
//         $reservation = Reservation::findOrFail($id);
//         $reservation->delete();
//         return redirect()->back()->with('success', 'تم حذف الحجز بنجاح!');
//     }
// }
