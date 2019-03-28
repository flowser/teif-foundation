<?php

use Illuminate\Database\Seeder;
use App\Models\Course\standard\CourseDuration;

class CourseDurationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseDuration::create(['name'  => '<1 Month',]);
        CourseDuration::create(['name'  => '1-3 Months',]);
        CourseDuration::create(['name'  => '3+ Months',]);
    }
}


