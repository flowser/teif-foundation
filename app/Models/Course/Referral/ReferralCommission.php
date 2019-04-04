<?php

namespace App\Models\Course\Referral;

use App\Models\Standard\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course\Referral\ReferralLink;

class ReferralCommission extends Model
{
    protected $fillable = [
        'referral_link_id',
        'user_id',
        'fee',
        'commission',
        'courseType',
        'skill',
        'course_id',
        'paid_at',
        'image',
        'name',
        'payment_confirmation'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function refferal_link()
    {
        return $this->belongsTo(ReferralLink::class, 'referral_link_id')
                   ->join('referral_courses','referral_links.referral_course_id','referral_courses.id')
                //    ->join('courses','referral_courses.course_id','courses.id')
                   ->select('referral_courses.*',
                            // 'courses.*',
                            'referral_links.*'
                        );
    }
}
