<?php

// FeatureFilter.php

namespace App\Filters;

class FeatureFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereIn('course_feature_id', $value);
    }
}


