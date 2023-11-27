<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function signup(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', 'unique:admin'],
            'password' => ['required', 'string',],
            'nama' => ['required', 'string']
        ]);

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // try {
            $admin = new Admin();
            $admin->username = $request->username;
            $admin->password = $request->password;
            $admin->nama = $request->nama;
            $admin->save();
            
        try {
            return redirect()
                ->route('auth.login')
                ->with('success', 'User"'. $request->username .'" berhasil didaftarkan.');
        } catch(\Exception $e) {
            return redirect()
                ->back()
                ->withErrors($e->__toString())
                ->withInput();
        }
    }

    public function register() {
        return view('auth.register');
    }

    public function signin(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => ['required', 'string', ''],
            'password' => ['required']
        ]);

        if($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $user = Admin::where('username', '=', $request->username)->first();
        if($user) {
            if($user->password == $request->password) {
                $request->session()->put('loginId', $user->username);
                return redirect()->route('guru.index');
            } else {
            return redirect()
                ->back()
                ->with('failed', 'password tidak sama')
                ->withInput();
            }
        } else {
            return redirect()
                ->back()
                ->with('failed', 'username belum terdaftar')
                ->withInput();
        }
    }

    public function logout() {
        if(Session::has('loginId')) {
            Session::pull('loginId');
            return redirect()->route('auth.login');
        }
    }
}