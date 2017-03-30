<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToClassroomScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('classroom_schedule', function (Blueprint $table) {
    	
    		$table->integer('classroom_id')->unsigned();
    		$table->foreign('classroom_id')->references('id')->on('classrooms');
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
    	Schema::table('classroom_schedule', function (Blueprint $table) {
    	
    		$table->dropForeign('classroom_schedule_classroom_id_foreign');
    		$table->dropForeign('classroom_schedule_schedule_id_foreign');
    		$table->dropColumn('classroom_id');
    		$table->dropColumn('schedule_id');
    	});
    }
}
