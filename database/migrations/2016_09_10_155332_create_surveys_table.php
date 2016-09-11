<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('welcome_text')->nullable();
            $table->longText('end_text')->nullable();
            $table->string('end_url')->nullable();
            $table->string('admin_name', 100);
            $table->string('admin_email');
            $table->boolean('allow_registration');
            $table->boolean('active');
            $table->boolean('anonymized');
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->softDeletes();
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
        Schema::drop('surveys');
    }
}
