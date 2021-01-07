<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contact; 

class Company extends Model
{
    protected $fillable = ['name', 'cnpj', 'telephone', 'email', 'site', 'note'];
    protected $casts = ['created_at' => 'updated_at'];

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }
}
