<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToApplicantWorkshopPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('applicant_workshop', function (Blueprint $table) {
    	
    		$table->integer('applicant_id')->unsigned();
    		$table->foreign('applicant_id')->references('id')->on('applicants');
    		$table->integer('workshop_id')->unsigned();
    		$table->foreign('workshop_id')->references('id')->on('workshops');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('applicant_workshop', function (Blueprint $table) {
    	
    		$table->dropForeign('applicant_workshop_applicant_id_foreign');
    		$table->dropForeign('applicant_workshop_workshop_id_foreign');
    		$table->dropColumn('applicant_id');
    		$table->dropColumn('workshop_id');
    	});
    }
}
