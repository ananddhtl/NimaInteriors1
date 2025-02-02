<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSubGroup extends Model
{
  

    use HasFactory;

    public function ItemGroup()
    { 
        return $this->belongsTo(ItemGroup::class, 'itemgroup_id');
    }
}