<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        //membuat fungsi yang menandakan bahwa tabel users memiliki relasi dengan tabel roles
        return $this->belongsTo(Role::class,'roles_id');
    }

    //membuat fungsi hasRule untuk dipanggil dan digunakan di file HakAksesMiddleware 
    public function hasRule($namaRule) {
        if ($this->role->namaRule == $namaRule) {
            return true;
        }
        return false;
    }
}
