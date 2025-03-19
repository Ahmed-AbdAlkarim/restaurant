<?php

namespace App\Http\Controllers;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class TablesController extends Controller
{
    // عرض جميع الطاولات
    function index()
    {
        $tables = Table::paginate(25);  // الحصول على جميع الطاولات من قاعدة البيانات
        return view('tables.index', compact('tables'));
    }

    // عرض نموذج لإضافة طاولة جديدة
    function create()
    {
        return view('tables.create');
    }

    // تخزين طاولة جديدة
    function submit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'capacity' => 'required|integer',
            'status' => 'required|in:available,reserved,occupied',
        ]);

        $table= Table::create([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'status' => $request->status, 
        ]);

        return redirect()->route('admin.tables')->with('success', 'Table created successfully.');
    }

    // تعديل طاولة
    function edit($id)
    {
        $table = Table::find($id);
        return view('tables.edit', compact('table'));
    }

    // تحديث الطاولة
    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
        ]);

        $table = Table::find($id);
        $table->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
        ]);

        return redirect()->route('admin.tables')->with('success', 'Table updated successfully.');
    }

    // حذف الطاولة
    function delete($id)
    {
        $table = Table::find($id);
        $table->delete();
        return redirect()->route('admin.tables')->with('success', 'Table deleted successfully.');
    }
}
