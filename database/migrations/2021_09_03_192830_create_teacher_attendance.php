<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherAttendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_attendances', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('teacher_id')->unsigned();

            $table->time('attendance_time')->default(date("H:i"));
            $table->date('attendance_date');
            $table->boolean('status')->default(1);


            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_attendances', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
        });

        Schema::dropIfExists('teacher_attendance');
    }
}
