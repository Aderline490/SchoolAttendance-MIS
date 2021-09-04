<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_students', function (Blueprint $table) {
            $table->integer('student_id')->unsigned();
            $table->integer('schedule_id')->unsigned();
            $table->primary(array('student_id', 'schedule_id'));

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schedule_students', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
            $table->dropForeign(['schedule_id']);
        });
        Schema::dropIfExists('schedule_students');
    }
}
