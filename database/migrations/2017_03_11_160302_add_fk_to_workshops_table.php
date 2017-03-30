<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('workshops', function (Blueprint $table) {
    	
    		$table->integer('proposal_id')->unsigned();
    		$table->foreign('proposal_id')->references('id')->on('proposals');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('workshops', function (Blueprint $table) {
    	
    		$table->dropForeign('workshops_proposal_id_foreign');
    		$table->dropColumn('proposal_id');
    	});
    }
}
