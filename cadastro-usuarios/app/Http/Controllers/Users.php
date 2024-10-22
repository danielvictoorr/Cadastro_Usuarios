<?php

namespace App\Http\Controllers;

use App\Models\User;

class Users extends Controller
{

    public function createUser(object $request)
    {
        if(empty($request->name)) {
            return response()->json(['message' => 'O nome deve ser informado.'], 400);
        }
        if(empty($request->email)) {
            return response()->json(['message' => 'O email deve ser informado.'], 400);
        }
        if(empty($request->phone)) {
            return response()->json(['message' => 'O telefone deve ser informado.'], 400);
        }

        $newUser = new User();

        $user = $newUser->createUser($request);

        if(!$user) {
            return response()->json(['message' => 'Ocorreu um erro ao criar o usuário.'], 500);
        }

        return response()->json(['message' => 'Usário criado com sucesso.'], 201);
    }
}