<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentLatetimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_latetimes', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('student_id')->unsigned();
            $table->time('duration');
            $table->date('latetime_date');

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
        Schema::table('student_latetimes', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });

        Schema::dropIfExists('student_latetimes');
    }
}
