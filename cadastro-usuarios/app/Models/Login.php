<?php 

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Namshi\JOSE\JWT;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;
class login extends Authenticatable
{
    // public function $jwtSecret = env(JWT_SECRET);
    public function createLogin(string $login, string $password)
    {

        DB::table('login')->insert([
            'login' => $login,
            'password' =>  Hash::make($password),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return true;
    }

    public function verifyLogin(string $login, string $password)
    {

        $user = DB::table('login')->where('login', $login)->first();

        return $user;
    }

}