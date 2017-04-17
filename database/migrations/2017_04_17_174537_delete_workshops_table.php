<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::table('workshops', function (Blueprint $table) {
    	
    		$table->dropForeign('workshops_proposal_id_foreign');
    		$table->dropColumn('proposal_id');
    	});

        Schema::dropIfExists('workshops');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('workshops', function (Blueprint $table) {
        	$table->increments('id');
        	$table->string('name');
        	$table->timestamps();
        });
	
	Schema::table('workshops', function (Blueprint $table) {
    	
    		$table->integer('proposal_id')->unsigned();
    		$table->foreign('proposal_id')->references('id')->on('proposals');
    	});
    }
}
