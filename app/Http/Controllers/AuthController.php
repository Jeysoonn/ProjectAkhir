<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\OrderHistory;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.regis');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome, Admin!');
            } elseif ($role === 'guest') {
                return redirect()->route('user.landing')->with('success', 'Welcome, Guest!');
            }

            return redirect()->route('user.landing')->with('success', 'Login berhasil!');
        }
        if (User::where('email', $request->email)->doesntExist()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email atau password salah');
        } else {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email atau password salah');
        }

    }

    public function doRegister(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Email sudah terdaftar. Silahkan gunakan email lain.');
        }
        $request->validate([

            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'required|string',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'role' => 'guest',
        ]);

        Auth::login($user);

        return redirect()->route('user.landing')->with('success', 'Registration successful. You are now logged in.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('landing');
    }
    public function adminDashboard()
    {
        $orderHistories = OrderHistory::all();
        $totalproduk= OrderHistory::sum('jumlah_produk');

        // Total nilai produk yang terjual
        $totaljual= OrderHistory::sum('produk_subtotal');

        $users = Auth::user();
        if (Auth::check() && Auth::user()->role === 'admin') {

            return view('admin.dashboard', compact ('orderHistories', 'totaljual', 'totalproduk'));
        }
        abort(403, 'Unauthorized access');
    }

    public function guestDashboard()
    {
        if (Auth::check() && Auth::user()->role === 'guest') {
            return view('user.landing');
        }
        abort(403, 'Unauthorized access');
    }

}
