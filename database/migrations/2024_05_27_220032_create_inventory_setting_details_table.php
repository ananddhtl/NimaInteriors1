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
        Schema::create('inventory_setting_details', function (Blueprint $table) {
            $table->id();
            $table->integer('unitStatus');
            $table->string('altUnits');
            $table->string('whereQty')->nullable()->default(0);
            $table->float('equals')->nullable()->default(0);
            $table->float('buyRate')->nullable()->default(0);
            $table->float('sellRate')->nullable()->default(0);
            $table->float('mrp')->nullable()->default(0);
            $table->float('discountPercent')->nullable()->default(0);
            $table->boolean('status')->default(0);
            $table->unsignedInteger('commonCode_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_setting_details');
    }
};