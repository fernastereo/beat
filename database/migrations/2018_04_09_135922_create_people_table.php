<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('idperson')->nullable()->unique()->comment('Identificaión de la persona');
            $table->string('verification_digit', 1)->nullable()->comment('Digito de verificacion del nit');
            $table->string('name', 255);
            $table->string('address', 255)->nullable()->comment('dirección de la persona');
            $table->string('city_name')->nullable()->comment('Ciudad de la persona');
            $table->string('email')->nullable()->unique();
            $table->string('phone_number_1')->nullable();
            $table->string('phone_number_2')->nullable();
            $table->string('cellphone_number_1')->nullable();
            $table->double('credit_limit', 12, 2)->nullable();
            $table->double('credit_used', 12, 2)->nullable();
            $table->string('person_type', 1)->comment('C: Customer | S: Supplier | B: Both Customer and supplier');
            $table->longText('comments')->nullable();
            $table->integer('company_id')->unsigned();
            $table->boolean('state');
            $table->timestamps();
            $table->foreign('company_id')->references('id')->on('companies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
}
