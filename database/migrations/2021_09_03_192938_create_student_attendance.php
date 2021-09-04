<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentAttendance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attendances', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('student_id')->unsigned();

            $table->time('attendance_time')->default(date("H:i"));
            $table->date('attendance_date');
            $table->boolean('status')->default(1);


            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_attendances', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });
        Schema::table('student_attendances', function (Blueprint $table) {
            $table->dropColumn('student_id');
    
        });

        Schema::dropIfExists('student_attendance');
    }
}
