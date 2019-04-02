<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('answer');
            $table->integer('points');
            $table->string('status');
            //создание поля для связывания с таблицей questions
            $table->unsignedBigInteger('question_id')->nullable();          
            //создание внешнего ключа для поля 'question_id', который связан с полем id таблицы 'questions'
            /*$table->foreign('question_id')->references('id')->on('questions');*/
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
        Schema::dropIfExists('answers');
    }
}
