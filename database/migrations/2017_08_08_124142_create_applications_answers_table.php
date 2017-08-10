<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationsAnswersTable extends Migration
{
     public function up()
    {
        Schema::create('application_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('answer')->nullable();
            $table->unsignedInteger('question_id');
            $table->unsignedInteger('application_session_id');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('application_answers');
    }
}
