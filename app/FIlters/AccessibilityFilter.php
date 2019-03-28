<?php

// AccessibilityFilter.php

namespace App\Filters;

class AccessibilityFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('course_accessibility_id', $value);
    }
}


