<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Translation;

class UpdateNlBeToNlInTranslations extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Retrieve all existing rows from the translations table
        $translations = Translation::all();

        // Update each row to copy nl_be to nl column
        foreach ($translations as $translation) {
            $translation->nl_translation = $translation->nl_be_translation;
            $translation->save();
        }

        // Now drop the nl_be column
        Schema::table('translations', function (Blueprint $table) {
            $table->dropColumn('nl_be_translation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // If you need to rollback, you might want to copy nl column data back to nl_be
        // This down method is optional and depends on your rollback requirements
    }
}
