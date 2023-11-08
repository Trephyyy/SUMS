<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'name' => 'root',
            'email' => env('HARDCODED_EMAIL'),
            'password' => Hash::make(env('HARDCODED_PASSWORD')),
            'isAdmin' => true,
            // Add other required fields here
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->where('name', 'root')->delete();
    }
};