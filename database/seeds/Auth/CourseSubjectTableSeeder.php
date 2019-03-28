<?php

use Illuminate\Database\Seeder;
use App\Models\Course\standard\CourseSubject;

class CourseSubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseSubject::create(['name' => 'Architecture',]);
        CourseSubject::create(['name' => 'Art & Culture',]);
        CourseSubject::create(['name' => 'Biology & Life Sciences',]);
        CourseSubject::create(['name' => 'Business & Management',]);
        CourseSubject::create(['name' => 'Chemistry',]);
        CourseSubject::create(['name' => 'Communication',]);
        CourseSubject::create(['name' => 'Computer Science',]);
        CourseSubject::create(['name' => 'Data Analysis & Statistics',]);
        CourseSubject::create(['name' => 'Design',]);
        CourseSubject::create(['name' => 'Economics & Finance',]);
        CourseSubject::create(['name' => 'Education & Teacher Training',]);
        CourseSubject::create(['name' => 'Electronics',]);
        CourseSubject::create(['name' => 'Energy & Earth Sciences',]);
        CourseSubject::create(['name' => 'Engineering',]);
        CourseSubject::create(['name' => 'Environmental Studies',]);
        CourseSubject::create(['name' => 'Ethics',]);
        CourseSubject::create(['name' => 'Food & Nutrition',]);
        CourseSubject::create(['name' => 'Health & Safety',]);
        CourseSubject::create(['name' => 'History',]);
        CourseSubject::create(['name' => 'Humanities',]);
        CourseSubject::create(['name' => 'Language',]);
        CourseSubject::create(['name' => 'Law',]);
        CourseSubject::create(['name' => 'Literature',]);
        CourseSubject::create(['name' => 'Math',]);
        CourseSubject::create(['name' => 'Medicine',]);
        CourseSubject::create(['name' => 'Music',]);
        CourseSubject::create(['name' => 'Philosophy & Ethics',]);
        CourseSubject::create(['name' => 'Physics',]);
        CourseSubject::create(['name' => 'Science',]);
        CourseSubject::create(['name' => 'Social Sciences',]);
    }
}


