<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function my_profile()
    {
        $user = Auth::user();

        return view('profile.index', [
            'user' => $user
        ]);
    }
}
