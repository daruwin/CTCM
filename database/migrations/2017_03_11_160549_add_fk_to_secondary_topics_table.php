<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToSecondaryTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('secondary_topics', function (Blueprint $table) {
    	
    		$table->integer('primary_topic_id')->unsigned();
    		$table->foreign('primary_topic_id')->references('id')->on('primary_topics');
    	});
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('secondary_topics', function (Blueprint $table) {
    	
    		$table->dropForeign('secondary_topics_primary_topic_id_foreign');
    		$table->dropColumn('primary_topic_id');
    	});
    }
}
