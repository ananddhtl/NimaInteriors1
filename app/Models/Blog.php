<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public function getTitleTranslation($locale)
    {
        return Translation::getTranslationByContent($this->title, $locale);
    }

    public function getDescriptionTranslation($locale)
    {
        return Translation::getTranslationByContent($this->description, $locale);
    }
}
