<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Shcedule;

class Contact extends Model
{
    protected $fillable = ['name', 'company_id', 'telephone', 'cellphone', 'email', 'note'];
    protected $casts = ['created_at' => 'updated_at'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }


}
