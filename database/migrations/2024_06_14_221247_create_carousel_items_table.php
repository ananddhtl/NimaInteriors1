<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselItemsTable extends Migration
{
    public function up()
    {
        Schema::create('carousel_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('frontend_homepage_id')->constrained()->onDelete('cascade');
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->string('text');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carousel_items');
    }
}
