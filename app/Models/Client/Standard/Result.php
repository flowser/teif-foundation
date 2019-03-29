<?php

namespace App\Models\Client\Standard;

use App\Models\Client\Client;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'course_order_id',
        'client_id',
        'course_status',//ongoing,finished,
        'certificte_status',//pending, Ready, Collected
        'collection_date', //initiating collection date
        'collection_method',        
    ];
    protected $casts = [
        'collection_method' => 'boolean',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function course_order()
    {
        return $this->belongsTo(Course_Order::class, 'course_order');
    }

}
