<?php

namespace App\Models\Course;

use App\Models\Order;
use App\Filters\CourseFilter;
use App\Models\Course\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Course\standard\CourseType;
use App\Models\Course\standard\CourseSkill;
use App\Models\Course\standard\CourseSchool;
use App\Models\Course\standard\CourseFeature;
use App\Models\Course\standard\CourseSubject;
use App\Models\Course\standard\CourseDuration;
use App\Models\Course\standard\CourseLanguage;
use App\Models\Course\Syllabus\CourseSyllabus;
use App\Models\Course\standard\CourseAvailability;
use App\Models\Course\standard\CourseAccessibility;


class Course extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'image',
        'brief',
        'start_date',//standard
        //regular
        'regular_duration', //automatic after selection of end date
        'regular_end_date',
        'regular_fee',
        //partitime
        'parttime_duration',
        'parttime_end_date',
        'parttime_fee',

        'active',

        'course_school_id',
        'course_skill_id',
        'course_duration_id',
        'course_availability_id',
        'course_subject_id',
        'course_type_id',
        'course_accessibility_id',
        'course_feature_id',
        'course_language_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $casts = [
        'active' => 'boolean',
    ];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

//    public function orderCols() //duplicate of the above columns in pivot table
//    {
//        return $this->belongsToMany(Course::class)
//            ->withPivot(
//                'qty',
//                'total',
//                'enroll_status',//enrolled in the course
//                'complete_status', //course completed
//                'cert_prod_status', //certificate ready
//                'cert_collect_status',//certification collection status
//                'confirm_cert_collect_status',//certification confirmation date collection by client as well as reviewing the course
//                'client_id',//to be used when lmitingg view of orders via pivot
//                'payment_confirmation'//payment confirmation before client views the course enrolled, prevent fraud
//            )
//            ->withTimestamps();
//    }



    public  function orders(){
        return $this->belongsToMany(Order::class)
            ->withPivot(
                'qty',
                'total',
                'enroll_status',//enrolled in the course
                'complete_status', //course completed
                'cert_prod_status', //certificate ready
                'cert_collect_status',//certification collection status
                'confirm_cert_collect_status',//certification confirmation date collection by client as well as reviewing the course
                'client_id',//to be used when lmitingg view of orders via pivot
                'payment_confirmation'//payment confirmation before client views the course enrolled, prevent fraud
            )
            ->withTimestamps();
    }

    // filter
    public function scopeFilter(Builder $builder, $request)
    {
        return (new CourseFilter($request))->filter($builder);
    }



    public function coursesyllabus()
    {
        return $this->hasOne(CourseSyllabus::class)
                    ->join('practices', 'course_syllabi.practice_id', '=', 'practices.id')
                    ->select(
                        'course_syllabi.*',
                        'practices.name as practice_name'
                    );
    }
    public function practice()
    {
        return $this->hasManyThrough(Practice::class, CourseSyllabus::class)
                    // ->join('practices', 'course_syllabi.practice_id', '=', 'practices.id')
                    // ->select(
                    //     'course_syllabi.*',
                    //     'practices.name as practice_name'
                    // );
                    ;
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function accessibility()
    {
        return $this->belongsTo(CourseAccessibility::class, 'course_accessibility_id');
    }
    public function skill()
    {
        return $this->belongsTo(CourseSkill::class, 'course_skill_id');
    }
    public function school()
    {
        return $this->belongsTo(CourseSchool::class, 'course_school_id');
    }
    public function duration()
    {
        return $this->belongsTo(CourseDuration::class, 'course_duration_id');
    }
    public function availability()
    {
        return $this->belongsTo(CourseAvailability::class, 'course_availability_id');
    }
    public function subject()
    {
        return $this->belongsTo(CourseSubject::class, 'course_subject_id');
    }
    public function type()
    {
        return $this->belongsTo(CourseType::class, 'course_type_id');
    }
    public function feature()
    {
        return $this->belongsTo(CourseFeature::class, 'course_feature_id');
    }
    public function language()
    {
        return $this->belongsTo(CourseLanguage::class, 'course_language_id');
    }

}
