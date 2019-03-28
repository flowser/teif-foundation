<?php

// ProductFilter.php

namespace App\Filters;

use App\Filters\SkillFilter;
use App\Filters\TypeFilter;
use App\Filters\SchoolFilter;
use App\Filters\AbstractFilter;
use App\Filters\DurationFilter;
use App\Filters\LanguageFilter;
use App\Filters\AccessibilityFilter;
use App\Filters\AvailabilityFilter;
use App\Filters\FeatureFilter;
use App\Filters\SubjectFilter;
use Illuminate\Database\Eloquent\Builder;

class CourseFilter extends AbstractFilter
{
    protected $filters = [
        'school_id' => SchoolFilter::class,
        'duration_id' => DurationFilter::class,
        'availability_id' => AvailabilityFilter::class,
        'subject_id' => SubjectFilter::class,
        'type_id' => TypeFilter::class,
        'skill_id' => SkillFilter::class,
        'accessibility_id' => AccessibilityFilter::class,
        'feature_id' => FeatureFilter::class,
        'language_id' => LanguageFilter::class,
    ];
}

