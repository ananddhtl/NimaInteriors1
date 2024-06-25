<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'nl_be_translation', 'nl_translation', 'en_translation'];

    public static function getTranslationByContent($content, $locale)
    {
        // Fetch translation based on 'key' matching content
        $translation = self::where('key', $content)->first();

        // If translation exists, return the appropriate translation based on locale
        if ($translation) {
            switch ($locale) {
                case 'nl_be':
                    return $translation->nl_be_translation;
                case 'nl':
                    return $translation->nl_translation;
                case 'en':
                    return $translation->en_translation;
                default:
                    return $content; // Return the content itself if locale not recognized
            }
        }

        // If no translation found, return the content itself
        return $content;
    }
}
