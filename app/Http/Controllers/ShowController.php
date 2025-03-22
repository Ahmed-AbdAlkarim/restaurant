<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Table; 
use App\Models\Menu; 
use Illuminate\Support\Facades\DB;
use App\Models\Chef;
use App\Models\About;

class ShowController extends Controller
{
    public function user() {
        $abouts = About::all();
        $tables = Table::all();
        $chefs = Chef::inRandomOrder()->take(4)->get();
        $menus = Menu::inRandomOrder()->take(6)->get();
        return view('user', compact('menus','abouts','chefs','tables'));
    }

    public function menu() {
        $abouts = About::all();
        $menus = Menu::all(); // جلب جميع العناصر من جدول menus
        return view('client.menu', compact('menus','abouts')); // إرسال البيانات للـ Blade
    }

    public function about() { 
        $abouts = About::all(); 
        $chefs = Chef::all(); 
        return view('client.about', compact('abouts', 'chefs'));
    }

    public function booking() {
        $tables = Table::where('status', 'available')->get(); // جلب الطاولات المتاحة فقط 
        $abouts = About::all();  
        return view('client.reservation', compact('tables','abouts'));
    }

    public function order()
    {
        $menus = Menu::all();
        $tables = Table::all();
        $abouts = About::all();
        return view('client.order', compact('menus', 'tables','abouts'));
    }

    public function submitOrder(Request $request)
    {
       $validatedData = $request->validate([
           'items.*.menu_id' => 'required|integer|exists:menus,id',
           'items.*.quantity' => 'required|integer|min:1',
       ]);
   
       $totalPrice = 0;
   
       // إنشاء الطلب بدون إجبار `table_id` و `status`
       $order = Order::create([
           'total_price' => 0,
           'status' => 'pending', // تعيين الحالة الافتراضية تلقائيًا
       ]);
   
       foreach ($request->items as $item) {
            $menuItem = Menu::find($item['menu_id']);
            $price = $menuItem->price * $item['quantity'];            
            $totalPrice += $price;
   
           $order->orderItems()->create([
               'menu_id' => $item['menu_id'],
               'quantity' => $item['quantity'],
               'price' => $price,
           ]);
       }
   
       $order->update(['total_price' => $totalPrice]);
   
       return redirect()->route('client.order')->with('success', 'Order created successfully.');
    }
    
}