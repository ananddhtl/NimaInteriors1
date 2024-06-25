<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignKeyFromFrontendHomepagesTable extends Migration
{
    public function up()
    {
        Schema::table('frontend_homepages', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign('frontend_homepages_project_id_foreign');
        });
    }

    public function down()
    {
        Schema::table('frontend_homepages', function (Blueprint $table) {
            // Add back the foreign key constraint if needed
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
        });
    }
}
