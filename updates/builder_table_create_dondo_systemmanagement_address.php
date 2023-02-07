<?php namespace Dondo\SystemManagement\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDondoSystemmanagementAddress extends Migration
{
    public function up()
    {
        Schema::create('dondo_systemmanagement_address', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('street', 36);
            $table->string('house_num', 36);
            $table->string('city', 36);
            $table->string('psc', 36);
            $table->string('note');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dondo_systemmanagement_address');
    }
}
