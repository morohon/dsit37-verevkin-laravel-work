<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('shortName', 30)->comment('Краткое наименование');
            $table->string('fullName', 50)->comment('Полное наименование');
            $table->string('inn', 12)->unique()->index()->comment('ИНН организации. Уникален');
            $table->string('phone', 12)->comment('Телефон организации');
            $table->string('city', 20)->comment('Город юридического адреса');
            $table->string('street', 30)->comment('Улица юридического адреса');
            $table->string('house', 4)->comment('Дом юридического адреса');
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
        Schema::dropIfExists('organizations');
    }
}
