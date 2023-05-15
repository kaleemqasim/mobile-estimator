<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_colors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->nullable()->constrained()->onDelete('cascade');
            $table->boolean('color_black')->default(0);
            $table->boolean('color_white')->default(0);
            $table->boolean('color_silver')->default(0);
            $table->boolean('color_gold')->default(0);
            $table->boolean('color_blue')->default(0);
            $table->boolean('color_grey')->default(0);
            $table->boolean('color_red')->default(0);
            $table->boolean('color_green')->default(0);
            $table->boolean('color_purple')->default(0);
            $table->boolean('color_pink')->default(0);
            $table->boolean('color_grey')->default(0);
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
        Schema::dropIfExists('device_colors');
    }
}
