<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentlessonsectionfollowupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentlessonsectionfollowups', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('student_id');
            $table->integer('lesson_section_id');
            $table->integer('done')->nullable()->default(0);
            $table->integer('done_correcting')->nullable()->default(0);
            $table->integer('admin_id')->nullable();
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studentlessonsectionfollowups');
    }
}
