<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'cnpj', 'telephone', 'email', 'site', 'note'];
    protected $casts = ['created_at' => 'updated_at'];

}
