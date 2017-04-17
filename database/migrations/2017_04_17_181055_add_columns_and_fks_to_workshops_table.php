<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsAndFksToWorkshopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workshops', function (Blueprint $table) {
    	
    		$table->integer('teacher_id')->unsigned();
    		$table->foreign('teacher_id')->references('id')->on('teachers');
    		$table->integer('classroom_id')->unsigned();
    		$table->foreign('classroom_id')->references('id')->on('classrooms');
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
    	
    		$table->dropForeign('proposals_teacher_id_foreign');
    		$table->dropForeign('proposals_classroom_id_foreign');
    		$table->dropColumn('teacher_id');
    		$table->dropColumn('classroom_id');
    	});
    }
}
