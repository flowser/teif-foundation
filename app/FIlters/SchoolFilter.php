<?php

// EducationFilter.php

namespace App\Filters;

class SchoolFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('course_school_id', $value);
    }
}

