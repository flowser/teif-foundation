<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManualCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manual_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('user_id');//served by
            $table->unsignedInteger('result_id');

            $table->string('collection_date')->nullable();
            $table->string('collector_name')->nullable();//pending, ready to be collected, Collected

            $table->string('id_no', 120)->nullable();
            $table->string('id_photo_front', 120)->nullable();
            $table->string('id_photo_back', 120)->nullable();

            $table->string('certificate_number')->nullable();
            $table->string('certificate_image')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manual_collections');
    }
}
