<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferralCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referral_commissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('referral_link_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('course_id')->nullable();
            $table->string('name')->nullable();
            $table->string('courseType')->nullable();
            $table->string('skill')->nullable();
            $table->string('paid_at')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('payment_confirmation')->default(0)->unsigned();
            $table->float('fee',8, 2)->nullable();
            $table->float('commission',8, 2)->nullable();
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('referral_link_id')->references('id')->on('referral_links')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('referral_commissions');
    }
}
