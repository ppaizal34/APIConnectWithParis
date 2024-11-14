<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function show_login()
    {
        $data = [
            'route' => 'authenticate'
        ];

        return view('auth.index', $data);
    }

    public function show_register()
    {
        $data = [
            'route' => 'register'
        ];

        return view('auth.index', $data);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email:dns'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Proses login berhasil');
        }

        return back()->withErrors([
            'error' => 'Proses login gagal. username atau password salah '
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register(Request $request)
    {
        try {
            // Validasi data
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'min:3', 'max:255'],
                'email' => ['required', 'email:dns', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'max:255'],
            ]);

            // Simpan data ke database
            $user = User::create($validatedData);
            Auth::login($user);
            
            // Berhasil menyimpan, redirect ke halaman sukses atau tampilkan pesan sukses
            return redirect('/');
        } catch (ValidationException $e) {
            // Jika validasi gagal, tangani error dan redirect kembali dengan pesan error
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (Exception $e) {
            // Jika ada error server, tangani error tersebut
            // Misalnya error saat mengakses database atau error tak terduga lainnya
            return redirect()->back()->with('error', 'Terjadi kesalahan pada server. Silakan coba lagi.')->withInput();
        }
    }
}
