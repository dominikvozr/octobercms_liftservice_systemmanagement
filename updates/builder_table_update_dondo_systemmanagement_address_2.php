<?php namespace Dondo\SystemManagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoSystemmanagementAddress2 extends Migration
{
    public function up()
    {
        Schema::table('dondo_systemmanagement_address', function($table)
        {
            $table->string('product_id')->nullable()->unsigned(false)->default(null)->comment(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('dondo_systemmanagement_address', function($table)
        {
            $table->integer('product_id')->nullable()->unsigned()->default(null)->comment(null)->change();
        });
    }
}
