<?php

namespace Dondo\Qrcodes\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDondoSystemmanagementProducts2 extends Migration
{

	public function up()
	{
		Schema::table('dondo_systemmanagement_products', function ($table) {
			$table->string('qrcode_id', 36);
		});
	}

	public function down()
	{
		Schema::table('dondo_systemmanagement_products', function ($table) {
			$table->dropColumn('qrcode_id');
		});
	}
}
