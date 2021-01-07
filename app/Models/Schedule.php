<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\EventType;
use App\Models\Resonsible;
use App\Models\Contact;

class Schedule extends Model
{
    protected $fillable = ['event_type_id','responsible_id','contact_id','name', 'date', 'note'];
    protected $casts = ['created_at' => 'updated_at'];

    public function getDateFormatBd($value)
    {
        return Carbon::parse($value)->format('Y-m-d\TH:i');
    }

    public function getDateFormatBr($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i');
    }

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function responsible()
    {
        return $this->belongsTo(Responsible::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

}
