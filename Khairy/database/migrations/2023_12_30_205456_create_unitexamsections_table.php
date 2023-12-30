<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitexamsectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unitexamsections', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('unit_id');
            $table->string('name');
            $table->integer('type');
            $table->text('stop_watch')->nullable();
            $table->text('answer_time')->nullable();
            $table->integer('hide')->default(0);
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('unitexamsections');
    }
}
