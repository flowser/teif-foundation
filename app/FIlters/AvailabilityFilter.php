<?php

namespace App\Filters;

class AvailabilityFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('course_availability_id', $value);
    }
}

