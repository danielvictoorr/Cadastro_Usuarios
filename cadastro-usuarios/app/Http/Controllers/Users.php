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

    public function getAllUsers()
    {
        $users = (new User)->allUsers();

        return response()->json($users);
    }

    public function updateUser(object $request)
     {
        if(empty($request))
        {
            return response()->json(['message' => 'O nome,email ou telefone deve ser informado.'], 400);
        }

        if(empty($request->id))
        {
            return response()->json(['message' => 'O id deve ser informado.'], 400);
        }

        $updateUsers = (new User);

        $user = $updateUsers->updateUser($request);

        if(!$user)
        {
            return response()->json(['message' => 'Ocorreu um erro ao atualizar o usuário.'], 500);
        }

        return response()->json(['message' => 'Usário atualizado com sucesso.'], 200);
     }
}