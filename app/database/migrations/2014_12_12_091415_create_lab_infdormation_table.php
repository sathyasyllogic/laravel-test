<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabInfdormationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		/*Schema::table('lab_information', function($table)
        {
            $table->dropColumn('created_date', 'modified_date');
        });

        Schema::table('lab_information', function($table)
        {
            $table->timestamps();
         });    */
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
