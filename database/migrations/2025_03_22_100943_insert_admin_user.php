<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'fattarelli_l@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('zanchina'), // Cambia la password
            'role' => 'admin',
            'profile_image' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        DB::table('users')->where('email', 'admin@example.com')->delete();
    }
};
