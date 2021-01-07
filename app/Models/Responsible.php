<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Shcedule;

class Responsible extends Model
{
    protected $fillable = ['name', 'telephone', 'cellphone', 'email', 'note'];
    protected $casts = ['created_at' => 'updated_at'];

    public function shcedule()
    {
        return $this->hasOne(Shcedule::class);
    }
}
