<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Login extends Controller
{
    public function login(Request $request)
    {
        if(empty($request->login) || empty($request->password)) {
            return response()->json(['message' => 'Login e senha devem ser informados.'], 400);
        }

        $login = new Login();

    }
}