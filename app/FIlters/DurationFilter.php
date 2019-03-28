<?php

// DurationFilter.php

namespace App\Filters;

class DurationFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('course_duration_id', $value);
    }
}

