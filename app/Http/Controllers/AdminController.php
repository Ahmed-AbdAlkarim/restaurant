<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class AdminController extends Controller
{
   public function adminIndex()
    {
        $users = User::paginate(1);
        // منطق التحكم الخاص بك هنا
        return view('admin');  // استبدل هذا بما يناسب مشروعك
    }

    function switchLang() {
        $lang = $_GET['lang'];
        session()->put('Lang',$lang);
        app()->setLocale($lang);
        return redirect()->back();
    }
}
