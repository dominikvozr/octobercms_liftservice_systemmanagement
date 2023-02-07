<?php namespace Dondo\SystemManagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDondoSystemmanagementProducts extends Migration
{
    public function up()
    {
        Schema::create('dondo_systemmanagement_products', function($table)
        {
            $table->engine = 'InnoDB';
            $table->string('id', 36)->primary();

        });
    }

    public function down()
    {
        Schema::dropIfExists('dondo_systemmanagement_products');
    }
}
