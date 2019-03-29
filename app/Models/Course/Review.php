<?php

namespace App\Models\Course;

use App\Models\Client\Client;
use App\Models\Course\Course;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'course_id',
        'client_id',
        'review',
        'what_to_improve',
        'ratings',
        'approval_status'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
