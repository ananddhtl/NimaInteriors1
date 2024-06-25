<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropProjectIdFromFrontendHomepagesTable extends Migration
{
    public function up()
    {
        Schema::table('frontend_homepages', function (Blueprint $table) {
            // Drop the column
            $table->dropColumn('project_id');
        });
    }

    public function down()
    {
        Schema::table('frontend_homepages', function (Blueprint $table) {
            // If you need to revert, add the column back
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
        });
    }
}
