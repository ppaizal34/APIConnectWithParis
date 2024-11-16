<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
            $user = $request->user();

            if($user->is_admin){
                $role_token = $user->createToken('admin_token', ['create', 'read', 'update', 'delete'])->plainTextToken;
            }else{
                $role_token =$user->createToken('user_token', ['read_only'])->plainTextToken;
            }

            $access_token = $user->createToken('access_token', ['access_token'], Carbon::now()->addHour())->plainTextToken;
            $refresh_token = $user->createToken('refresh_token', ['issue-access-token'])->plainTextToken;

            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'Proses Login Berhasil',
                'data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_token' => $role_token,
                    'token' => $access_token,
                    'refresh_token' => $refresh_token
                ]
            ], 200);
            // return redirect()->intended('/')->with('success', 'Proses login berhasil');
        }

        return back()->withErrors([
            'error' => 'Proses login gagal. username atau password salah '
        ]);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
    
        // Hapus semua token pengguna
        $request->user()->tokens()->delete();
    
        // Invalidate session jika menggunakan session-based
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return response()->json([
            'status' => true,
            'message' => 'Logout berhasil'
        ], 200);
        // return redirect('/');
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
