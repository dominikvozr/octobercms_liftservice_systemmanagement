<?php namespace Dondo\SystemManagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoSystemmanagementProducts extends Migration
{
    public function up()
    {
        Schema::table('dondo_systemmanagement_products', function($table)
        {
            $table->string('title');
            $table->string('type');
            $table->string('brand');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('dondo_systemmanagement_products', function($table)
        {
            $table->dropColumn('title');
            $table->dropColumn('type');
            $table->dropColumn('brand');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->dropColumn('deleted_at');
        });
    }
}
