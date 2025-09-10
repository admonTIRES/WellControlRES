<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ID_PROJECT')->nullable();
            $table->unsignedInteger('ID_CANDIDATE')->nullable();
            $table->text('UNITS')->nullable();
            $table->double('PRACTICAL')->nullable();
            $table->double('EQUIPAMENT')->nullable();
            $table->double('PYP')->nullable();
            $table->double('RESUME')->nullable();
            $table->boolean('STATUS');
            $table->boolean('RESIT');
            $table->double('EQUIPAMENT_RESIT')->nullable();
            $table->double('PYP_RESIT')->nullable();
            $table->date('RESIT_DATE')->nullable();
            $table->double('FINAL_SCORE')->nullable();
            $table->boolean('FINAL_STATUS')->nullable();
            $table->boolean('HAVE_CERTIFIED')->nullable();
            $table->text('CERTIFIED')->nullable();
            $table->date('EXPIRATION')->nullable();
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
        Schema::dropIfExists('course');
    }
}
