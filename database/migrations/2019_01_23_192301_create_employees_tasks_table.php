<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idTasks')->unsigned()->comment('Номер задачи в системе');
            $table->foreign('idTasks')->references('id')->on('tasks');
            $table->integer('idResponsible')->unsigned()
                                                    ->comment('Сотрудник, которому поставлена задача');
            $table->foreign('idResponsible')->references('id')->on('employees');
            $table->integer('idCoordinator')->unsigned()
                                                    ->comment('Руководитель, который назначил 
                                                                        задачу на специалиста');
            $table->foreign('idCoordinator')->references('id')->on('employees');
            $table->dateTime('dateOfIssued')->comment('Дата постановки задачи');
            $table->dateTime('deadline')->comment('Срок исполнения задачи');
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
        Schema::dropIfExists('employees_tasks');
    }
}
