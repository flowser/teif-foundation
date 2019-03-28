<?php

// ExperienceFilter.php

namespace App\Filters;

class SubjectFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('course_subject_id', $value);
    }
}

