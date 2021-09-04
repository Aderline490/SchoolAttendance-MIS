<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_teachers', function (Blueprint $table) {
            $table->integer('teacher_id')->unsigned();
            $table->integer('schedule_id')->unsigned();
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
        Schema::table('schedule_teachers', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
            $table->dropForeign(['schedule_id']);
        });
        Schema::dropIfExists('schedule_teachers');
    }
}
