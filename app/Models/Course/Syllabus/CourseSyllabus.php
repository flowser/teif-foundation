<?php

namespace App\Models\Course\Syllabus;

use App\Models\Course\Course;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course\Syllabus\standard\Practice;

class CourseSyllabus extends Model
{
    protected $fillable = [
            'course_id',
            'requirement',
            'practice_id',
            'lessons',
            'hours',
            'what_to_learn',
            'what_to_achieve',
];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function practice()
    {
        return $this->belongsTo(Practice::class);
    }
}
