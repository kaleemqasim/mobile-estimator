<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimations', function (Blueprint $table) {
            $table->id();
            $table->string('device_name');
            $table->string('estimated_price');
            $table->string('color')->nullable();
            $table->string('battery_test')->nullable();
            $table->string('screen_test')->nullable();
            $table->string('back_side_test')->nullable();
            $table->string('purchase_test')->nullable();
            $table->string('person_name')->nullable();
            $table->string('person_contact_no')->nullable();
            $table->string('person_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimations');
    }
}
