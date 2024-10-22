<?php 

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;
class login extends Authenticatable
{

    public function createLogin(string $login, string $password)
    {

        DB::table('login')->insert([
            'login' => $login,
            'password' =>  Hash::make($password)
        ]);
    }

}