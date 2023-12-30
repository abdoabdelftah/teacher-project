<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentexamanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentexamanswers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('student_id')->nullable();
            $table->integer('type')->nullable();
            $table->integer('exam_id')->nullable();
            $table->integer('lesson_section_id')->nullable();
            $table->string('student_answer')->nullable();
            $table->string('right_answer')->nullable();
            $table->integer('is_right')->nullable();
            $table->integer('points')->nullable();
            $table->timestamp('time_to_show_answer')->nullable()->useCurrent();
            $table->integer('unit_exam_section_id')->nullable();
            $table->text('student_answer_picture')->nullable();
            $table->string('right_answer_picture')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentexamanswers');
    }
}
