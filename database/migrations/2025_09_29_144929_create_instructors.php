<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            $table->text('FNAME_INSTRUCTOR')->nullable();
            $table->text('MDNAME_INSTRUCTOR')->nullable();
            $table->text('LSNAME_INSTRUCTOR')->nullable();
            $table->text('MAIL_INSTRUCTOR')->nullable();
            $table->text('LADA_INSTRUCTOR')->nullable();
            $table->text('TEL_INSTRUCTOR')->nullable();
            $table->text('ACREDITACION_INSTRUCTOR')->nullable();
            $table->text('EXPIRACION_INSTRUCTOR')->nullable();
            $table->text('DOC_INSTRUCTOR')->nullable();
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
        Schema::dropIfExists('instructors');
    }
}
