<?php

namespace App\Models\Course\Referral;

use App\Models\Course\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course\Referral\ReferralLink;
use App\Models\Course\Referral\ReferralCommission;

class ReferralCourse extends Model
{
    protected $fillable = [
        'course_id',
        'uri',
        'lifetime_days'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function refferallinks()
    {
        return $this->hasMany(ReferralLink::class)
        ->where('user_id', Auth::user()->id);
    }
    public function refferalcommissions()
    {
        return $this->hasManyThrough(ReferralCommission::class, ReferralLink::class);
    }

}
