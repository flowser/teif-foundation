<?php

namespace App\Models\Course\Syllabus\standard;

use App\Models\Course\Course;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course\Syllabus\CourseSyllabus;

class Practice extends Model
{
    protected $fillable = [
       'name',
    ];
    public function coursesyllabi()
    {
        return $this->hasMany(CourseSyllabus::class)
        // ->join('course_syllabi', 'course_syllabi.practice_id', '=', 'practices.id')
        ->join('courses', 'course_syllabi.course_id', '=', 'courses.id')
                    // ->select(
                    //     // 'course_syllabi.*',
                    //     // 'courses.*'
                    // );
                    ;
    }
    public function courses()
    {
        return $this->belongsTo(Course::class)
        // ->join('course_syllabi', 'course_syllabi.practice_id', '=', 'practices.id')
        // ->join('courses', 'course_syllabi.course_id', '=', 'courses.id')
        //             ->select(
        //                 'course_syllabi.*'
        //                 // 'courses.*'
        //             );
                    ;
    }
}
