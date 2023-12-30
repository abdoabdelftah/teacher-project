<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name')->nullable();
            $table->integer('lesson_section_id')->nullable();
            $table->integer('type')->nullable();
            $table->integer('lesson_id')->nullable();
            $table->integer('question_type')->nullable();
            $table->integer('choose_type')->nullable();
            $table->text('question')->nullable();
            $table->text('choose1')->nullable();
            $table->text('choose2')->nullable();
            $table->text('choose3')->nullable();
            $table->text('choose4')->nullable();
            $table->text('right_answer')->nullable();
            $table->integer('points')->nullable();
            $table->string('time_for_answer')->nullable();
            $table->string('stop_watch')->nullable();
            $table->integer('unit_id')->nullable();
            $table->integer('unit_exam_section_id')->nullable();
            $table->text('text_answer')->nullable();
            $table->integer('hide')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
