<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelFeed4 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_feed', function($table)
        {
            $table->text('twitter')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_feed', function($table)
        {
            $table->dropColumn('twitter');
        });
    }
}
