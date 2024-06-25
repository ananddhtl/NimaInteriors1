<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Translation;

class CopyNlToNlBeInTranslations extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Retrieve all existing rows from the translations table
        $translations = Translation::all();

        // Update each row to copy nl_translation to nl_be_translation column
        foreach ($translations as $translation) {
            $translation->nl_be_translation = $translation->nl_translation;
            $translation->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // If you need to rollback, you might want to do nothing here because the down method is optional

        // Optionally, if you want to rollback, you could set nl_be_translation back to null or empty
        // Schema::table('translations', function (Blueprint $table) {
        //     $table->update(['nl_be_translation' => null]);
        // });
    }
}
