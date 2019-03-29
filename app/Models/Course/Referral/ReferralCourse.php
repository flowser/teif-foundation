<?php

namespace App\Models\Course\Referral;

use Illuminate\Database\Eloquent\Model;

class ReferralCourse extends Model
{
    protected $fillable = [
        'course_id',
        'uri',
        'lifetime_minutes'
    ];
}
