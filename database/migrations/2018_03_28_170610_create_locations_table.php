<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('locations')){
            Schema::create('locations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->longText('description')->nullable();
                $table->boolean('state')->default(true);
                $table->integer('company_id')->unsigned();
                $table->foreign('company_id')->references('id')->on('companies');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
