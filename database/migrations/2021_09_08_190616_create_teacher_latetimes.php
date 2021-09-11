<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherLatetimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_latetimes', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('teacher_id')->unsigned();
            $table->time('duration');
            $table->date('latetime_date');

            $table->foreign('teacher_id')->references('id')->on('teacher')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_latetimes', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
        });

        Schema::dropIfExists('teacher_latetimes');
    }
}
