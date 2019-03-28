<?php

namespace App\Models\Client\Standard;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'client_id',
        'course_status',//ongoing,finished,
        'certificte_status',//pending, Ready, Collected
        'collection_date', //initiating collection date
        'sendbyparcel',
        'parcel_fee',
    ];
    protected $casts = [
        'sendbyparcel' => 'boolean',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

}
