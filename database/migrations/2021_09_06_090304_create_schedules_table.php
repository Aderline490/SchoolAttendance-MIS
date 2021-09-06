<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('slug')->unique();
            $table->time('time_in');
        });

        Schema::create('schedule_students', function (Blueprint $table) {
            $table->integer('schedule_id')->unsigned();
            $table->integer('student_id')->unsigned();
            $table->primary(array('student_id', 'schedule_id'));

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
        });

        Schema::create('schedule_teachers', function (Blueprint $table) {
            $table->integer('schedule_id')->unsigned();
            $table->integer('teacher_id')->unsigned();
            $table->primary(array('teacher_id', 'schedule_id'));

            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
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
            $table->dropForeign(['id']);
            $table->dropForeign(['schedule_id']);
        });
        Schema::dropIfExists('schedule_students');

        Schema::table('schedule_teachers', function (Blueprint $table) {
            $table->dropForeign(['id']);
            $table->dropForeign(['schedule_id']);
        });
        Schema::dropIfExists('schedule_teachers');
                
        Schema::dropIfExists('schedules');
    }
}
