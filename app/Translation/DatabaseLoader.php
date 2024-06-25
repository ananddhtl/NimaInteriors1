<?php
namespace App\Translation;

use Illuminate\Translation\FileLoader;
use App\Models\Translation;
use Illuminate\Support\Facades\Log; // Import the Log facade

class DatabaseLoader extends FileLoader
{
    public function load($locale, $group, $namespace = null)
    {
       

        // Fetch translations from the database based on the locale
        $databaseTranslations = Translation::pluck("{$locale}_translation", 'key')->toArray();


        // Load file-based translations first
        $fileTranslations = parent::load($locale, $group, $namespace);
   

        // Merge database translations over file translations
        $mergedTranslations = array_merge($fileTranslations, $databaseTranslations);
     

        // Ensure all values are strings
        foreach ($mergedTranslations as $key => $value) {
            if (!is_string($value)) {
           
                unset($mergedTranslations[$key]); // Remove non-string values
            }
        }



        return $mergedTranslations;
    }
}
