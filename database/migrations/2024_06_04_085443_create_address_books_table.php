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
        Schema::create('address_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('normal_users');
            $table->string('addresstype');
            $table->string('fullname');
            $table->bigInteger('postcode');
            $table->bigInteger('housenumber');
            $table->bigInteger('addition');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_books');
    }
};