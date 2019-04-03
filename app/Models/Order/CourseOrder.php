<?php

namespace App\Models\Order;

use App\Models\Order\Order;
use App\Models\Course\Course;
use App\Models\Client\Standard\Result;
use Illuminate\Database\Eloquent\Model;

class CourseOrder extends Model
{
    protected $table = 'course_order';
    protected $fillable = [
        'order_id',
        'course_id',
        'payment_confirmation',
        'name',
        'courseType',
        'skill',
        'image',
        'qty',
        'fee'
    ];

    protected $casts = [
        'payment_confirmation' => 'boolean',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }


}
