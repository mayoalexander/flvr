<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelFeed extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_feed', function($table)
        {
            $table->string('media_id')->nullable();
            $table->string('embed')->nullable();
            $table->string('type')->nullable();
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_feed', function($table)
        {
            $table->dropColumn('media_id');
            $table->dropColumn('embed');
            $table->dropColumn('type');
            $table->increments('id')->unsigned()->change();
        });
    }
}
