<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
         $method = $request->isMethod('post');
            switch ($method) {
                case true:
                        $this->validate($request, [
                            'username' => 'required',
                            'password' => 'required|min:4'
                        ]);
                        $authenticate_user = Auth::attempt(['username' => strtolower($request->input('username')), 'password' => strtolower($request->input('password'))]);
                        if ($authenticate_user) {
                            return redirect('product/purchase')->with('success', 'Welcome!');
                        }else{
                            return back()->with('error', 'Wrong Username or Password');
                        }
                break;
                case false:
                    if (Auth::check()) {
                        return redirect('product/purchase');
                    }
                    return view('login');
                break;
                default:
                     if (Auth::check()) {
                        return redirect('product/purchase');
                    }
                    return view('login');
                break;
            }
    }
}
