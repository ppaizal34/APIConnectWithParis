<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Filament\Facades\Filament;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function show_login()
    {
        $data = [
            'title' => 'Login',
            'route' => 'authenticate',
        ];

        return view('auth.index', $data);
    }

    public function show_register()
    {
        $data = [
            'title' => 'Register',
            'route' => 'register'
        ];

        return view('auth.index', $data);
    }

    public function authenticate(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            $user = $request->user();

            if($user->is_admin){
                $role_token = $user->createToken('admin_token', ['create', 'read', 'update', 'delete'])->plainTextToken;
            }else{
                $role_token = $user->createToken('user_token', ['read_only'])->plainTextToken;
            }

            $expired_access_token = Carbon::now()->addHours(24);
            // $expired_access_token = Carbon::now()->addSeconds(30);
            $expired_refresh_token = Carbon::now()->addHours(24);

            $access_token = $user->createToken('access_token', ['access_token'], $expired_access_token)->plainTextToken;
            $refresh_token = $user->createToken('refresh_token', ['issue-access-token'], $expired_refresh_token)->plainTextToken;

            $request->session()->regenerate();

            return response()->json([
                'success' => true,
                'message' => 'Proses Login Berhasil',
                'data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'is_admin' => $user->is_admin,
                    'expired_access_token' => $expired_access_token,
                    'role_token' => $role_token,
                    'token' => $access_token,
                    'refresh_token' => $refresh_token,
                    'expired_refresh_token' => $expired_refresh_token,
                ]
            ], 200);

            // return redirect()->intended('/')->with('success', 'Proses login berhasil');
        }

        return response()->json([
            'status' => false,
            'message' => 'Proses login gagal. username atau password salah'
        ], 401);
        // return back()->withErrors([
        //     'error' => 'Proses login gagal. username atau password salah '
        // ]);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }
    
        try {
            // Hapus semua token pengguna (untuk API)
            $request->user()->tokens()->delete();
    
            // Invalidate sesi jika menggunakan session-based
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            // Berikan respons berhasil
            return response()->json([
                'status' => true,
                'message' => 'Logout berhasil',
            ], 200);
        } catch (\Exception $e) {
            // Tangani error jika ada
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat logout',
                'error' => $e->getMessage(),
            ], 500); // Internal Server Error
        }
    }

    public function logout_admin(Request $request)
    {
        /* 
        Method ini berfungsi untuk admin pada tombol sign out
        Untuk Custume 
        APIConnectWithParis\vendor\filament\filament\resources\views\widgets\account-widget.blade.php 
        */
        try {
            Filament::auth()->logout();
            // Hapus semua token pengguna (untuk API)
            $request->user()->tokens()->delete();
    
            // Invalidate sesi jika menggunakan session-based
            $request->session()->invalidate();
            $request->session()->regenerateToken();
    
            // Berikan respons berhasil
            return response()->json([
                'status' => true,
                'message' => 'Logout berhasil',
            ], 200);
        } catch (\Exception $e) {
            // Tangani error jika ada
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat logout',
                'error' => $e->getMessage(),
            ], 500); // Internal Server Error
        }
    }

    public function register(Request $request)
    {
        try {
            $insert = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ];
          
            // Simpan data ke database
            $user = User::create($insert);
            Auth::login($user);

            $role_token = $user->createToken('user_token', ['read_only'])->plainTextToken;
            $access_token = $user->createToken('access_token', ['access_token'], Carbon::now()->addHour())->plainTextToken;
            $refresh_token = $user->createToken('refresh_token', ['issue-access-token'])->plainTextToken;
            
            return response()->json([
                'success' => true,
                'message' => 'Register Berhasil!',
                'data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_token' => $role_token,
                    'token' => $access_token,
                    'refresh_token' => $refresh_token
                ]
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan pada server'
            ], 500);
        }
    }

    public function refresh_token(Request $request)
    {
        DB::table('personal_access_tokens')
            ->where('tokenable_id', Auth::user()->id)
            ->where('name', 'access_token')
            ->delete();

        $expired_access_token = Carbon::now()->addHours(24);
        $access_token = $request->user()->createToken('access_token', ['access-api'], $expired_access_token)->plainTextToken;

        return response()->json([
            'status' => 'true',
            'message' => 'Token berhasil di perbaharui',
            'data' => [
                'email' => $request->user()->email,
                'expired_access_token' => $expired_access_token,
                'access_token' => $access_token,
            ]
        ], 200);
    }
    
}
