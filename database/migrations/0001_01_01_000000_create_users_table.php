<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('last_login')->default('0');
            $table->string('last_online')->default('0');
            $table->string('motto')->default('Welcome to DevCMS');
            $table->string('look')->default('hr-115-42.hd-195-19.ch-3030-82.lg-275-1408.fa-1201.ca-1804-64');
            $table->enum('gender', ['M', 'F'])->default('M');
            $table->string('rank')->default('1');
            $table->string('credits')->default('2500');
            $table->string('points')->default('500');
            $table->string('pixels')->default('500');
            $table->string('gotw_points')->default('0');
            $table->enum('online' , ['0', '1' ,'2'])->default('0');
            $table->enum('hide_online' , ['0', '1'])->default('0');
            $table->string('auth_ticket')->default('');
            $table->string('ip_register')->nullable();
            $table->string('ip_current')->nullable();
            $table->string('machine_id')->default('');
            $table->string('home_room')->default('0');
            $table->string('secret_key')->nullable();
            $table->string('pincode')->nullable();
            $table->string('extra_rank')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
