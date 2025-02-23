<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'manager', 'user'])->default('user');
            $table->string('status', 20)->default('active');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        $roles = ['admin', 'manager', 'user'];
        foreach($roles as $role){
            DB::table('users')->insert([
                'name' => $role . ' name',
                'email' => $role . '@gmail.com',
                'password' => Hash::make('123456789'),
                'role' => $role,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};