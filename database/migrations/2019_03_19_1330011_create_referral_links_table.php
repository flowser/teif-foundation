<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_links', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('organisation_affiliate_id')->nullable();
            $table->unsignedInteger('referral_course_id');
            $table->string('code', 36)->index();
            $table->unique(['referral_course_id', 'user_id']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('referral_course_id')->references('id')->on('referral_courses')->onDelete('cascade');
            $table->foreign('organisation_affiliate_id')->references('id')->on('organisation_affiliate')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral_links');
    }
}
