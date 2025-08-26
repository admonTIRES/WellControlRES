<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate', function (Blueprint $table) {
            $table->id();
            $table->text('ID_PROJECT')->nullable();
            $table->text('COMPANY_PROJECT')->nullable();
            $table->unsignedInteger('COMPANY_ID_PROJECT')->nullable();
            $table->text('CR_PROJECT')->nullable();
            $table->text('LAST_NAME_PROJECT')->nullable();
            $table->text('FIRST_NAME_PROJECT')->nullable();
            $table->text('MIDDLE_NAME_PROJECT')->nullable();
            $table->text('DOB_PROJECT')->nullable();
            $table->text('ID_NUMBER_PROJECT')->nullable();
            $table->text('EMAIL_PROJECT')->nullable();
            $table->text('PASSWORD_PROJECT')->nullable();
            $table->text('POSITION_PROJECT')->nullable();
            $table->text('MEMBERSHIP_PROJECT')->nullable();
            $table->text('STATUS_MAIL_PROJECT')->nullable();
            $table->text('ACTIVO')->nullable();
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
        Schema::dropIfExists('candidate');
    }
}
