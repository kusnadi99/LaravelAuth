<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            //2. membuat foreign key antara tabel users dan tabel roles
            $table->unsignedInteger('roles_id')->nullable();
            //3. membuat kolom username digunakan untuk login
            $table->string('username')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        //1. membuat tabel roles yang memiliki field id dan namaRule
        Schema::create('roles', function(Blueprint $kolom) {
            $kolom->increments('id');
            $kolom->string('namaRule');
        });

        //4. membuat inisialisasi untuk foreign key
        Schema::table('users', function(Blueprint $kolom) {
            //membuat roles id sebagai relasi/jembatan antara tabel roles dan tabel users sebagai foreign key
            $kolom->foreign('roles_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // schema untuk menghapus tabel users
        Schema::dropIfExists('users');
        //5. membuat schema untuk menghapus tabel rules
        Schema::dropIfExists('roles');
    }
}
