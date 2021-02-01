<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = ['name','cod','agency','agency_dv','account','account_dv','manager','phone','note'];
    protected $casts = ['created_at' => 'updated_at'];
}
