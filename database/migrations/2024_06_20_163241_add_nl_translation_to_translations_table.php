<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNlTranslationToTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('translations', function (Blueprint $table) {
            $table->text('nl_translation')->nullable()->after('en_translation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('translations', function (Blueprint $table) {
            $table->dropColumn('nl_translation');
        });
    }
}
