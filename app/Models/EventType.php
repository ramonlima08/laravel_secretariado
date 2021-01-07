<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shcedule;

class EventType extends Model
{
    protected $fillable = ['name', 'note'];
    protected $casts = ['created_at' => 'updated_at'];
    
    public function shcedule()
    {
        return $this->hasOne(Shcedule::class);
    }
    
}
