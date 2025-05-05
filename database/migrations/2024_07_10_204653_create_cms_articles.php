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
        Schema::create('cms_articles', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('title');
            $table->string('img');
            $table->string('desc');
            $table->string('published_by'); // Corrected typo from 'publushed_by'
            $table->text('content');
            $table->timestamps(); // This already includes 'created_at' and 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_articles');
    }
};
