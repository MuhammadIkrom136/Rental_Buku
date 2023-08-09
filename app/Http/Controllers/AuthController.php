<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        // cek apakah login valid

        if (Auth::attempt($credentials)) {
            // cek apakah user status = active
            if (Auth::user()->status != 'active') {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                session()->flash('status', 'failed');
                session()->flash('message', 'your account is not active yet. please contact admin');
                return redirect('/login');
            }

            $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('dashboard');
            }
            if (Auth::user()->role_id == 2) {
                return redirect('profile');
            }
            // $request->session()->regenerate();

            // return redirect();
        }
        session()->flash('status', 'failed');
        session()->flash('message', 'login invalid');
        return redirect('login');
    }
    public function logout(request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
    public function registerProcess(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required',

        ]);



        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => 'active',
        ]);

        return redirect('/login');
    }
}
