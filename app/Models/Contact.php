<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'company_id', 'telephone', 'cellphone', 'email', 'note'];
    protected $casts = ['created_at' => 'updated_at'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
