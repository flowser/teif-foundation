<?php

// SkillFilter.php

namespace App\Filters;

class SkillFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('course_skill_id', $value);
    }
}

