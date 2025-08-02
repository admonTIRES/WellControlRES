<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyect extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyect', function (Blueprint $table) {
            $table->id();
            $table->text('CONTACT_NAME_PROJEC')->nullable();
            $table->text('CONTACT_PHONE_PROJECT')->nullable();
            $table->text('COURSE_TYPE_PROJECT')->nullable();
            $table->text('COURSE_NAME_ES_PROJECT')->nullable();
            $table->text('COURSE_NAME_EN_PROJECT')->nullable();
            $table->text('FOLIO_PROJECT')->nullable();
            $table->text('LOCATION_PROJECT')->nullable();
            $table->text('CITY_PROJECT')->nullable();
            $table->text('CENTER_NUMBER_PROJECT')->nullable();
            $table->text('CERTIFICATION_CENTER_PROJECT')->nullable();
            $table->text('LANGUAGE_PROJECT')->nullable();
            $table->text('ACCREDITING_ENTITY_PROJECT')->nullable();
            $table->text('OPERATION_TYPE_PROJECT')->nullable();
            $table->longText('ACCREDITATION_LEVELS_PROJECT')->nullable();
            $table->longText('BOP_TYPES_PROJECT')->nullable();
            $table->longText('COMPANIES_PROJECT')->nullable();
            $table->date('COURSE_START_DATE_PROJECT')->nullable();
            $table->date('COURSE_END_DATE_PROJECT')->nullable();
            $table->datetime('MEMBERSHIP_START_PROJECT')->nullable();
            $table->datetime('MEMBERSHIP_END_PROJECT')->nullable();
            $table->date('EXAM_DATE_PROJECT')->nullable();
            $table->time('EXAM_TIME_PROJECT')->nullable();
            $table->date('PRACTICAL_EXAM_DATE_PROJECT')->nullable();
            $table->time('PRACTICAL_EXAM_TIME_PROJECT')->nullable();
            $table->integer('INSTRUCTOR_ID_PROJECT')->nullable();
            $table->text('INSTRUCTOR_EMAIL_PROJECT')->nullable();
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
        Schema::dropIfExists('proyect');
    }
}
