<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitexamsectionfollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitexamsectionfollowups', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('student_id');
            $table->integer('unit_exam_section_id');
            $table->dateTime('time_posted')->nullable();
            $table->integer('done')->nullable()->default(0);
            $table->integer('admin_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unitexamsectionfollowups');
    }
}
