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
        Schema::create('site_support_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('ticket_type');
            $table->string('message');
            $table->string('handled_by');
            $table->string('reply_message');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_support_tickets');
    }
};
