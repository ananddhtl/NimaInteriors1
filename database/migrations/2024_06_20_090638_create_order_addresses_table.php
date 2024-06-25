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
        Schema::create('order_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('normal_users')->onDelete('cascade');
            $table->string('addresstype');
            $table->string('fname');
            $table->string('lname');
            $table->string('postalcode');
            $table->string('street_name');
            $table->string('house_no');
            $table->string('suffix');
            $table->string('bus_no')->nullable();
            $table->string('phone_no')->nullable();
            $table->string('company_name')->nullable();
            $table->string('reference_no')->nullable();
            $table->string('vat_no')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_addresses');
    }
};
