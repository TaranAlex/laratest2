<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('test_id')->nullable();
            //создание внешнего ключа для поля 'test_id', который связан с полем id таблицы 'tests'
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->unsignedBigInteger('question_id')->nullable();
            //создание внешнего ключа для поля 'question_id', который связан с полем id таблицы 'questions'
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
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
        Schema::dropIfExists('test_questions');
    }
}
