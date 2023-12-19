<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth-token')->plainTextToken;

            return responses(200, $token, null);
        }
        return responses(400, null, null);
    }

    public function users()
    {
        if (!auth()->user()->is_admin) {
            return responses(403, null, null);
        }

        $users = User::all();

        return responses(200, $users, null);
    }

    public function currentUser()
    {
        if (!auth()->user()) {
            return responses(401, null, null);
        }

        $user = auth()->user();

        return responses(200, $user, null);
    }

}
