<?php

namespace App\Http\Controllers;
use App\Models\Chef;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index()
    {
        $chefs = Chef::all();
        return view('chef.index', compact('chefs'));
    }

    public function create()
    {
        return view('chef.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/chefs', $filename);
            $data['image'] = 'chefs/' . $filename;
        }

        Chef::create([
            'name' => $request->name,
            'specialty' => $request->specialty,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'image' => $data['image'] ?? 'chefs/default.png',
        ]);
        

        return redirect()->route('admin.chefs')->with('success', 'تم إضافة الشيف بنجاح!');
    }

    public function edit(Chef $chef)
    {
        return view('chef.edit', compact('chef'));
    }

    public function update(Request $request, Chef $chef)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('chefs', 'public');
        }

        $chef->update($data);

        return redirect()->route('admin.chefs')->with('success', 'تم تحديث بيانات الشيف بنجاح!');
    }

    public function delete(Chef $chef)
    {
        $chef->delete();
        return redirect()->route('admin.chefs')->with('success', 'تم حذف الشيف بنجاح!');
    }
}