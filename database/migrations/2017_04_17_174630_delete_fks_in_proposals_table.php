<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteFksInProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proposals', function (Blueprint $table) {
    	
    		$table->dropForeign('proposals_temary_id_foreign');
    		$table->dropForeign('proposals_teacher_id_foreign');
    		$table->dropForeign('proposals_classroom_id_foreign');
    		$table->dropColumn('temary_id');
    		$table->dropColumn('teacher_id');
    		$table->dropColumn('classroom_id');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proposals', function (Blueprint $table) {
    	
    		$table->integer('temary_id')->unsigned();
    		$table->foreign('temary_id')->references('id')->on('temaries');
    		$table->integer('teacher_id')->unsigned();
    		$table->foreign('teacher_id')->references('id')->on('teachers');
    		$table->integer('classroom_id')->unsigned();
    		$table->foreign('classroom_id')->references('id')->on('classrooms');
    	});
    }
}
