<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function showAdminRegisterForm()
    {
        return view('auth.admin-register');
    }

    public function showAdminLoginForm()
    {
        return view('admin.home.auth.admin-login');
    }

    public function dashboard()
    {
        return view('admin.home.index');
    }

    public function adminLogin(AdminLoginRequest $request)
    {
        try{
            $admin = Admin::where('email', $request->email)->first();

            if(!$admin){
                return redirect()->back()->withError('Unauthorised user login');
            }
            if ($admin){
                if (password_verify($request->password, $admin->password)){
                    Session::put('id', $admin->id);
                    Session::put('name', $admin->name);
                    return redirect('/admin/dashboard');
                }else {
                    return redirect()->back()->withError('Password does not match');
                }
            }else {
                return redirect()->back()->withError('Email does not match');
            }
        }catch(Exception $exception){
            return redirect()->back()->withError($exception->getMessage());
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('admin.login.form')->with('success', 'You are successfully logged out');
    }
}
