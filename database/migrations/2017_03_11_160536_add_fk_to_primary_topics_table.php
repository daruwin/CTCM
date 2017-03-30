<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPrimaryTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::table('primary_topics', function (Blueprint $table) {
    	
    		$table->integer('temary_id')->unsigned();
    		$table->foreign('temary_id')->references('id')->on('temaries');
    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::table('primary_topics', function (Blueprint $table) {
    	
    		$table->dropForeign('primary_topics_temary_id_foreign');
    		$table->dropColumn('temary_id');
    	});
    }
}
