<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(ProjectImages::class)->orderBy('position', 'asc');
    }
    public function carouselItems()
    {
        return $this->hasMany(CarouselItem::class);
    }
    public function getTitleTranslation($locale)
    {
        return Translation::getTranslationByContent($this->title, $locale);
    }

    public function getDescriptionTranslation($locale)
    {
        return Translation::getTranslationByContent($this->description, $locale);
    }
}
