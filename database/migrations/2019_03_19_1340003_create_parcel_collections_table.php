<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParcelCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcel_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('result_id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('user_id');//served by

            $table->string('certificate_number')->nullable();
            $table->string('certificate_image')->nullable();

            $table->string('company_name')->nullable();
            $table->string('parcel_number')->nullable();//pending, ready to be collected, Collected
            $table->float('parcel_fee', 8, 2)->nullable();
            $table->tinyInteger('delivered')->default(0)->unsigned(); //0 on transit
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('result_id')->references('id')->on('results')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcel_collections');
    }
}
