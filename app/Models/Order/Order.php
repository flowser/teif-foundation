<?php

namespace App\Models\Order;

use App\Models\Client\Client;
use App\Models\Course\Course;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'client_id',
        'total',
        'payment_method',
        'transaction_code',
        'transaction_image'
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

     //has many
     public function courses()
     {
         return $this->belongsToMany(Course::class,'course_order')
                     ->withPivot(
                        'payment_confirmation',
                        'name',
                        'courseType',
                        'skill',
                        'image',
                        'qty',
                        'fee'
                     )
                     ->withTimestamps();
     }
}
