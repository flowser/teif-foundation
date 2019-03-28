<?php

// TypeFilter.php

namespace App\Filters;

class TypeFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('course_type_id', $value);
    }
}


