<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index()->comment('Наименование подразделения');
            $table->integer('idOrganization')->unsigned()->comment('Организация, которой принадлежит');
            $table->foreign('idOrganization')->references('id')->on('organizations');
            $table->integer('idChief')->unsigned()->comment('Руководитель подразделения');
            $table->foreign('idChief')->references('id')->on('employees');
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
        Schema::dropIfExists('units');
    }
}
