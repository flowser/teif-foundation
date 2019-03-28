<?php

// TypeFilter.php

namespace App\Filters;

class AgeFilter
{
    public function filter($builder, $value)
    {
        $age = explode("-", $value);
            $start = $age[0];
            $end = $age[1];

        return $builder->whereIn('course_age', '>=', $start)
                       ->whereIn('course_age', '<=', $end);
    }
}
