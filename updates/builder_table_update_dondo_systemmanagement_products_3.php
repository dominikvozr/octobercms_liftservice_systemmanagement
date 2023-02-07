<?php namespace Dondo\SystemManagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoSystemmanagementProducts3 extends Migration
{
    public function up()
    {
        Schema::table('dondo_systemmanagement_products', function($table)
        {
            $table->string('year_of_production', 10)->nullable();
            $table->string('location', 36)->nullable();
            $table->string('operator', 36)->nullable();
            $table->integer('address_id')->unsigned();
            $table->double('carrying_capacity', 10, 0)->nullable();
            $table->double('speed', 10, 0)->nullable();
            $table->string('ec_operator');
            $table->date('review_data')->nullable();
            $table->renameColumn('brand', 'manufacturer');
        });
    }
    
    public function down()
    {
        Schema::table('dondo_systemmanagement_products', function($table)
        {
            $table->dropColumn('year_of_production');
            $table->dropColumn('location');
            $table->dropColumn('operator');
            $table->dropColumn('address_id');
            $table->dropColumn('carrying_capacity');
            $table->dropColumn('speed');
            $table->dropColumn('ec_operator');
            $table->dropColumn('review_data');
            $table->renameColumn('manufacturer', 'brand');
        });
    }
}
