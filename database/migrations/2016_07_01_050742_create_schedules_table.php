<?php

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
            $table->increments('id');
            $table->unsignedInteger('instructor_id');
            $table->unsignedInteger('subject_id');
            $table->unsignedInteger('room_id');
            $table->string('from_time');
            $table->string('to_time');
            $table->string('day');
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->default(0);

            $table->foreign('subject_id')
                ->references('id')->on('subjects')
                ->onDelete('cascade');;
            $table->foreign('room_id')
                ->references('id')->on('rooms')
                ->onDelete('cascade');;
            $table->foreign('instructor_id')
                ->references('id')->on('instructors')
                ->onDelete('cascade');


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
        Schema::drop('schedules');
    }
}
