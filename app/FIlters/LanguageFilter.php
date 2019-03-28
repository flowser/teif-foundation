<?php

// LanguageFilter.php

namespace App\Filters;

class LanguageFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('course_language_id', $value);
    }
}


