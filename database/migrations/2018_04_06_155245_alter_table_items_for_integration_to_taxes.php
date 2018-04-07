<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableItemsForIntegrationToTaxes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('tax_iva');
            $table->renameColumn('include_iva', 'included_tax');
            $table->integer('tax_id')->after('stock_max')->unsigned();
            $table->foreign('tax_id')->references('id')->on('taxes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            if (!Schema::hasColumn('items', 'tax_iva')){
                $table->double('tax_iva', 4, 2)->nullable();
            }
            if (Schema::hasColumn('items', 'included_tax')){
                $table->renameColumn('included_tax', 'include_iva');
            }
            $table->dropForeign('items_tax_id_foreign');
            $table->dropColumn('tax_id');
        });
    }
}
