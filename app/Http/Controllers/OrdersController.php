<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Table;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('orders.index', compact('orders'));

    }

    

    // عرض نموذج لإنشاء طلب جديد
    public function create()
    {
        $tables = Table::all();
        $menus = Menu::all();
        return view('orders.create', compact('tables', 'menus'));
    }

    // تخزين الطلب الجديد
   // تخزين الطلب الجديد
   public function submit(Request $request)
    {
        dd($request->all());

        $validatedData = $request->validate([
            'items.*.menu_id' => 'required|integer|exists:menus,id',
            'items.*.quantity' => 'required|integer|min:1',
            'contact' => 'required|string', // تأكد من استقبال رقم الهاتف
        ]);

        // تأكد إن المستخدم مسجل الدخول
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
        }

        $totalPrice = 0;

        // إنشاء الطلب مع user_id و contact
        $order = Order::create([
            'user_id' => $userId,
            'contact' => $request->contact,
            'total_price' => 0,
            'status' => 'pending',
        ]);
        
        

        foreach ($request->items as $item) {
            $price = Menu::find($item['menu_id'])->price * $item['quantity'];
            $totalPrice += $price;

            $order->orderItems()->create([
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity'],
                'price' => $price,
            ]);
        }

        $order->update(['total_price' => $totalPrice]);

        return redirect()->route('admin.orders')->with('success', 'Order created successfully.');
    }



    // تعديل الطلب (عرض الطلب لتعديله)
    public function edit($id)
    {
        $order = Order::with('orderItems')->findOrFail($id);
        $tables = Table::all();
        $menuItems = Menu::all();

        return view('orders.edit', compact('order', 'tables', 'menuItems'));
    }

    // تحديث حالة الطلب أو تعديله
    // تحديث حالة الطلب أو تعديله
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        // التحقق من صحة البيانات المرسلة
        $request->validate([
            'table_id' => 'nullable|exists:tables,id',
            'status' => 'nullable|in:pending,preparing,served,completed,cancelled',
            'items.*.menu_id' => 'exists:menus,id',
            'items.*.quantity' => 'integer|min:1',
        ]);

        // تحديث البيانات الأساسية للطلب
        $order->update([
            'table_id' => $request->filled('table_id') ? $request->table_id : $order->table_id,
            'status' => $request->filled('status') ? $request->status : $order->status,
        ]);

        // التعامل مع العناصر
        $order->orderItems()->delete(); // حذف العناصر القديمة

        if ($request->has('items')) {
            foreach ($request->items as $item) {
                $order->orderItems()->create([
                    'menu_id' => $item['menu_id'],
                    'quantity' => $item['quantity'],
                    'price' => Menu::find($item['menu_id'])->price * $item['quantity'],
                ]);
            }
        }

        return redirect()->route('admin.orders')->with('success', 'Order updated successfully.');
    }


    // حذف الطلب
    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders')->with('success', 'Order deleted successfully.');
    }
}
