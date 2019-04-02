<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('test_name');
            //создание поля для связывания с таблицей user
            $table->unsignedBigInteger('user_id')->nullable();
            //создание внешнего ключа для поля 'user_id', который связан с полем id таблицы 'users'
            /*$table->foreign('user_id')->references('id')->on('users');*/
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
        Schema::dropIfExists('tests');
    }
}
