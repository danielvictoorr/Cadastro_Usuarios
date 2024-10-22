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

        $user = $login->createLogin($request->login, $request->password);

        if(!$user) {
            return response()->json(['message' => 'Ocorreu um erro ao criar o login.'], 500);
        }

        return response()->json(['message' => 'Login criado com sucesso.'], 200);
    }
}