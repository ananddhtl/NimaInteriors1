<?php
// app/Models/CarouselItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselItem extends Model
{
    use HasFactory;

    protected $fillable = ['frontend_homepage_id', 'project_id', 'text', 'image'];

    public function frontendHomepage()
    {
        return $this->belongsTo(FrontendHomepage::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function getTranslatedTextAttribute()
    {
        return get_translation("carousel_item.text.{$this->id}", $this->text);
    }
}
