<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemGroup extends Model
{
    use HasFactory;

    public function itemsubgroup()
    {
        return $this->hasMany(ItemSubGroup::class); 
    }
    public function InventorySetting()
    {
        return $this->hasMany(ItemSubGroup::class); 
    }
}