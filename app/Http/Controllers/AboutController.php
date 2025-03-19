<?php

namespace App\Http\Controllers;
use App\Models\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::all();
        return view('abouts.index', compact('about'));
    }

    public function edit(About $about)
    {
        return view('abouts.edit', compact('about'));
    }

    public function update(Request $request, About $about)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description_1' => 'required|string',
            'description_2' => 'required|string',
            'years_experience' => 'required|integer',
            'master_chefs' => 'required|integer',
        ]);

        $about->update($request->all());

        return redirect()->route('admin.abouts')->with('success', 'تم تحديث بيانات "من نحن" بنجاح!');
    }
}
