<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessonsections', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('lesson_id');
            $table->integer('section_type');
            $table->string('name');
            $table->integer('section_id')->nullable();
            $table->integer('priority')->nullable();
            $table->integer('hide')->default(0);
            $table->integer('block')->default(0);
            $table->tinyInteger('has_time')->default(0);
            $table->string('stop_watch')->nullable();
            $table->dateTime('start_time')->nullable()->default('2000-08-02 01:11:47');
            $table->dateTime('end_time')->nullable()->default('2031-08-02 01:11:47');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessonsections');
    }
}
