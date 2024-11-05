<?php

namespace App\Http\Controllers;

use App\Models\login as ModelsLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Login extends Controller
{
    public function createLogin(Request $request)
    {
        if(empty($request->login) || empty($request->password)) {
            return response()->json(['message' => 'Login e senha devem ser informados.'], 400);
        }

        $login = new ModelsLogin();

        $user = $login->createLogin($request->login, $request->password);

        if(!$user) {
            return response()->json(['message' => 'Ocorreu um erro ao criar o login.'], 500);
        }

        return response()->json(['message' => 'Login criado com sucesso.'], 200);
    }

    public function login(Request $request)
    {
        try{
            if(empty($request->login) || empty($request->password)) {
                return response()->json(['message' => 'Login e senha devem ser informados.'], 400);
            }

            $credentials = (new ModelsLogin())->verifyLogin($request->login, $request->password);

            if (!$token = Auth::attempt($credentials->password)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return response()->json(['token' => $token]);
        }
        catch(\Exception $e){
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}