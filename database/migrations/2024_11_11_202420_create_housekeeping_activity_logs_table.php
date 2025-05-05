<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    class CreateHousekeepingActivityLogsTable extends Migration
{
    public function up()
    {
        Schema::create('housekeeping_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_user_id'); // Reference to the user ID
            $table->string('ip_address', 45)->nullable(); // To store IPv4 or IPv6
            $table->string('action_performed'); // Description of the action
            $table->timestamps(); // To include created_at (timestamp)
            
            // Add a foreign key to link to the users table if necessary
            $table->foreign('staff_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('housekeeping_activity_logs');
    }
    }
