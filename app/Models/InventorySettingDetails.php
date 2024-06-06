<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorySettingDetails extends Model
{
    use HasFactory;

    public function inventorysetting()
    {
        return $this->belongsTo(InventorySettings::class, 'commonCode_id', 'id');
    }
    
    
   
}