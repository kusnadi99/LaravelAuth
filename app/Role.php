<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //1. memberitahu model bahwa tabel di databasenya namanya roles
    protected $table = 'roles';

    //2. memberitahu bahwa tabel roles punya relasi dengan tabel users
    public function user() {
    	//konsep tabel roles ke users yaitu many to one
    	return $this->hasMany(User::class);
    }
}
