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
        Schema::create('dummy_seconds', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            
            $table->float('instock')->default(0);
            $table->float('outstock')->default(1);
            $table->float('unitEqualsTo');
            $table->float('bonus')->nullable()->default(0);
            $table->float('quantity')->default(0);
            $table->string('units');
            $table->float('rate')->nullable()->default(1);
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dummy_seconds');
    }
};