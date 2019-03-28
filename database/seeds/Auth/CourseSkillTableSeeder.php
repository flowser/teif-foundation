<?php

use Illuminate\Database\Seeder;
use App\Models\Course\standard\CourseSkill;

class CourseSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseSkill::create(['name'  => 'Beginner',]);
        CourseSkill::create(['name'  => 'InterMediate',]);
        CourseSkill::create(['name'  => 'Advanced',]);
    }
}


