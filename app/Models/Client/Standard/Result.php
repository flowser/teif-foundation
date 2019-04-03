<?php

namespace App\Models\Client\Standard;

use App\Models\Client\Client;
use App\Models\Course\Course;
use App\Models\Order\CourseOrder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client\Standard\ManualCollection;
use App\Models\Client\Standard\ParcelCollection;

class Result extends Model
{
    protected $fillable = [
        'course_order_id',
        'client_id',
        'course_id',
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
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function courseorder()
    {
        return $this->belongsTo(CourseOrder::class);
    }
    public function manualcollections()
    {
        return $this->hasMany(ManualCollection::class);
    }
    public function parcelcollections()
    {
        return $this->hasMany(ParcelCollection::class);
    }

}
