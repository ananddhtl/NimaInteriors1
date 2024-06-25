<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendHomepage extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image'];

    public function carouselItems()
    {
        return $this->hasMany(CarouselItem::class);
    }
    public function projects()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function getTranslatedTitleAttribute()
    {
        return get_translation("frontend_homepage.title.{$this->id}", $this->title);
    }

    public function getTranslatedContentAttribute()
    {
        return get_translation("frontend_homepage.content.{$this->id}", $this->content);
    }
}
