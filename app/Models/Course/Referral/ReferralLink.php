<?php

namespace App\Models\Course\Referral;

use Ramsey\Uuid\Uuid;
use App\Models\Standard\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course\Referral\ReferralCourse;
use App\Models\Course\Referral\ReferralCommission;

class ReferralLink extends Model
{
    protected $fillable = ['user_id', 'referral_course_id'];


    protected static function boot()
    {
        static::creating(function (ReferralLink $model) {
            $model->generateCode();
        });

        parent::boot();
    }

    private function generateCode()
    {
        $this->code = (string)Uuid::uuid1();
    }


    public static function getReferral($user, $course)
    {
        return static::with('referralcourse','commissions')->firstOrCreate([
            'user_id' => $user->id,
            'referral_course_id' => $course->id
        ]);
    }



    public function getLinkAttribute()
    {
        return url($this->referralcourse->uri) . '?ref=' . $this->code;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function referralcourse()
    {
        // TODO: Check if second argument is required
        return $this->belongsTo(ReferralCourse::class, 'referral_course_id')
                ->join('courses', 'referral_courses.course_id', 'courses.id')
                ->join('course_skills', 'courses.course_skill_id', 'course_skills.id')
                ->select('courses.*',
                        'referral_courses.*',
                        'courses.name as courses_name',
                        'course_skills.name as skill_name'
                    );
    }

    public function commissions()
    {
        return $this->hasMany(ReferralCommission::class);
    }
}


