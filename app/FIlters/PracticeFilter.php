<?php

// PracticeFilter.php

namespace App\Filters;

class PracticeFilter
{
    public function filter($builder, $value)
    {
        return $builder->whereHas('practice', function($query) use($value)
                                    {
                                    $query ->whereIn('practice_id', $value);
                                    }
                                );
    }
}


