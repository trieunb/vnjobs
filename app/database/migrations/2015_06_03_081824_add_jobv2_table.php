<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddJobv2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jobv2', function(Blueprint $table)
		{
			$table->integer('luotxem');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jobv2', function(Blueprint $table)
		{
			$table->dropColumn('luotxem');
		});
	}

}
