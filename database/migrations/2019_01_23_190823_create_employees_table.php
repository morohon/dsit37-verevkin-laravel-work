<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName', 20)->comment('Имя сотрудника');
            $table->string('secondName', 30)->index()->comment('Фамилия сотрудника');
            $table->string('middleName', 30)->nullable()
                                                                ->comment('Отчетство сотрудника. Может быть
                                                                                    null т.к. у иностранных граждан 
                                                                                    может не быть отчества');
            $table->string('passportSerial', 4)->comment('Серия паспорта');
            $table->string('passportNumber', 6)->comment('Номер паспорта');
            $table->string('passportIssued', 50)->comment('Кем выдан паспорт');
            $table->dateTime('passportDateIssued')->comment('Дата выдачи пасспорта');
            $table->string('codeOfUnit')->index()->comment('Код подразделения');
            $table->integer('idPost')->unsigned()->comment('Занимаемая должность');
            $table->foreign('idPost')->references('id')->on('posts');
            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id')->on('users');

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
        Schema::dropIfExists('employees');
    }
}
