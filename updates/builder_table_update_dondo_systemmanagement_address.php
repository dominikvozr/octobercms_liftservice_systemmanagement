<?php namespace Dondo\SystemManagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoSystemmanagementAddress extends Migration
{
    public function up()
    {
        Schema::table('dondo_systemmanagement_address', function($table)
        {
            $table->integer('product_id')->nullable()->unsigned();
        });
    }
    
    public function down()
    {
        Schema::table('dondo_systemmanagement_address', function($table)
        {
            $table->dropColumn('product_id');
        });
    }
}
