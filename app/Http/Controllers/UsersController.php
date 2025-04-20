<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    function index(Request $request) {
        $query = User::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->orWhere('contact', 'like', "%$search%")
                ->orWhere('status', 'like', "%$search%")
                ->orWhere('role', 'like', "%$search%");
            });
        }

        $users = $query->get();
        return view('users.index',compact('users'));
    }
    function create() {
        return view('users.create');
    }
    public function submit(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'contact' => 'required',
            'status' => 'required',
            //'country' => 'required',
            'role' => 'required',
            //'plan' => 'required',
            'password' => 'required|min:8', 

        ]);

        // إضافة البيانات إلى قاعدة البيانات
        $user= User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact' => $validatedData['contact'],
            'status' => $validatedData['status'],
            //'country' => $validatedData['country'],
            'role' => $validatedData['role'],
            //'plan' => $validatedData['plan'],
            'password' => Hash::make($validatedData['password']), // تشفير كلمة المرور
        ]);

        // إعادة توجيه المستخدم بعد الحفظ
        return redirect()->route('admin.users');
    }
    function edit($id) {
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }

    function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id, // السماح بنفس الإيميل لنفس المستخدم
            'contact' => 'required',
            'status' => 'required',
            'role' => 'required',
        ]);
    
        $user = User::find($id);
    
        // تحديث البيانات الأساسية
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->status = $request->status;
        $user->role = $request->role;
    
        // تحديث كلمة المرور فقط إذا أدخل المستخدم كلمة جديدة
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save(); // حفظ البيانات
    
        return redirect()->route('admin.users')->with('success', 'تم تحديث بيانات المستخدم بنجاح!');
    }
    function delete($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users');
    }


}
