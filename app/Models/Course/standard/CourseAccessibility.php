<?php

namespace App\Models\Course\standard;


use App\Models\Course\Course;
use Illuminate\Database\Eloquent\Model;

class CourseAccessibility extends Model
{
    protected $fillable = [
        'name',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
