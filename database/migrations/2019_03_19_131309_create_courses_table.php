<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('image')->nullable();
            $table->longText('brief')->nullable();
            $table->date('start_date')->nullable();//standard
            //regular
            $table->string('regular_duration', 120)->nullable();
            $table->date('regular_end_date')->nullable();
            $table->float('regular_fee', 8, 2)->nullable();
            //partitime
            $table->string('parttime_duration', 120)->nullable();
            $table->date('parttime_end_date')->nullable();
            $table->float('parttime_fee', 8, 2)->nullable();

            $table->tinyInteger('active')->default(1)->unsigned();

            $table->integer('course_school_id')->unsigned()->nullable();
            $table->integer('course_skill_id')->unsigned()->nullable();
            $table->integer('course_duration_id')->unsigned()->nullable();
            $table->integer('course_availability_id')->unsigned()->nullable();
            $table->integer('course_subject_id')->unsigned()->nullable();
            $table->integer('course_type_id')->unsigned()->nullable();
            $table->integer('course_accessibility_id')->unsigned()->nullable();
            $table->integer('course_feature_id')->unsigned()->nullable();
            $table->integer('course_language_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('course_school_id')->references('id')->on('course_schools')->onDelete('cascade');
            $table->foreign('course_skill_id')->references('id')->on('course_skills')->onDelete('cascade');
            $table->foreign('course_duration_id')->references('id')->on('course_durations')->onDelete('cascade');
            $table->foreign('course_availability_id')->references('id')->on('course_availabilities')->onDelete('cascade');
            $table->foreign('course_subject_id')->references('id')->on('course_subjects')->onDelete('cascade');
            $table->foreign('course_type_id')->references('id')->on('course_types')->onDelete('cascade');
            $table->foreign('course_accessibility_id')->references('id')->on('course_accessibilities')->onDelete('cascade');
            $table->foreign('course_feature_id')->references('id')->on('course_features')->onDelete('cascade');
            $table->foreign('course_language_id')->references('id')->on('course_languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}

