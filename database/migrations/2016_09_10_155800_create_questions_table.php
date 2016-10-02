<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_question_id')->unsigned()->nullable();
            $table->integer('group_id')->unsigned();
            $table->longText('title');
            $table->mediumText('description')->nullable();
            $table->string('type', 25)->nullable();
            $table->integer('order')->nullable();
            $table->boolean('mandatory')->default(false);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('parent_question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}
