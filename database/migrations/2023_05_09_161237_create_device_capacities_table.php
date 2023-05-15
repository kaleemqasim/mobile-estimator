<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceCapacitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_capacities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->nullable()->constrained()->onDelete('cascade');
            $table->double('capacity_8gb')->nullable();
            $table->double('capacity_16gb')->nullable();
            $table->double('capacity_32gb')->nullable();
            $table->double('capacity_64gb')->nullable();
            $table->double('capacity_128gb')->nullable();
            $table->double('capacity_256gb')->nullable();
            $table->double('capacity_512gb')->nullable();
            $table->double('capacity_1tb')->nullable();
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
        Schema::dropIfExists('device_capacities');
    }
}
