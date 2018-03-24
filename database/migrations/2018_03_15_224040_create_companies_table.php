<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idcompany')->nullable()->unique()->comment('Nit de la empresa');
            $table->string('verification_digit', 1)->nullable()->comment('Digito de verificacion del nit');
            $table->string('name')->default('My Company');
            $table->string('address')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable()->unique();
            $table->integer('companytype_id')->unsigned()->nullable();
            $table->integer('currency_id')->unsigned()->nullable();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
