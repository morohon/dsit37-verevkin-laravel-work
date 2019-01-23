<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->comment('Краткое наименование задачи');
            $table->string('content')->comment('Описание задачи');
            $table->integer('idStatus')->unsigned()->comment('Статус задачи');
            $table->foreign('idStatus')->references('id')->on('statuses');
            $table->dateTime('dateOfEnd')->nullable()->comment('Дата завершения задачи');
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
        Schema::dropIfExists('tasks');
    }
}
