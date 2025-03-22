<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    // عرض جميع الأصناف
    public function index()
    {
        $menus = Menu::paginate(25);  // جلب جميع الأصناف
        return view('menus.index', compact('menus'));  // تمرير البيانات إلى الـ view
    }

    // عرض صفحة إنشاء صنف جديد
    public function create()
    {
        return view('menus.create');  // عرض صفحة إضافة صنف جديد
    }


    // حفظ الصنف الجديد في قاعدة البيانات
    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu_images', 'public'); // ✅ يتم تخزين الصورة في storage
        } else {
            $imagePath = null; // ✅ إذا لم تُرفع صورة، تبقى القيمة فارغة
        }

        Menu::create([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.menu')->with('success', 'Menu item added successfully!');
    }

    // عرض صفحة تعديل صنف موجود
    public function edit($id)
    {
        $menu = Menu::find($id);  // جلب الصنف من قاعدة البيانات
        return view('menus.edit', compact('menu'));
    }


    // تحديث الصنف في قاعدة البيانات
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $menu = Menu::find($id);
        $menu->update([
            'name' => $request->name,
            'price' => $request->price,
            'category' => $request->category,
        ]);        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu_images', 'public'); // حفظ الصورة الجديدة
            $menu->update(['image' => $imagePath]); // تحديث الصورة في قاعدة البيانات
        }

        return redirect()->route('admin.menu')->with('success', 'Menu item updated successfully!');
    }


    // حذف صنف من قاعدة البيانات
    public function delete($id)
    {
        $menu = Menu::find($id);
        $menu->delete();  // حذف الصنف

        return redirect()->route('admin.menu')->with('success', 'Menu item deleted successfully!');
    }

}
