<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToProposalSchedulePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('proposal_schedule', function (Blueprint $table) {
    	
    		$table->integer('proposal_id')->unsigned();
    		$table->foreign('proposal_id')->references('id')->on('proposals');
    		$table->integer('schedule_id')->unsigned();
    		$table->foreign('schedule_id')->references('id')->on('schedules');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('proposal_schedule', function (Blueprint $table) {
    	
    		$table->dropForeign('proposal_schedule_proposal_id_foreign');
    		$table->dropForeign('proposal_schedule_schedule_id_foreign');
    		$table->dropColumn('proposal_id');
    		$table->dropColumn('schedule_id');
    	});
    }
}
