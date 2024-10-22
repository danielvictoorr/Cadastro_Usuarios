<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function createUser(object $request)
    {
        DB::table('usuarios')->insert([
            'nome' => $request->name,
            'telefone' => $request->phone,
            'email' => $request->email,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return true;
    }

    public function allUsers()
    {
        return DB::table('usuarios')->get();
    }

    public function updateUser(object $request)
    {
        DB::table('usuarios')->where('id', $request->id)->update([
            'nome' => $request->name,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return true;
    }
}
