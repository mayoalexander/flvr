<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelFeed3 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_feed', function($table)
        {
            $table->string('description', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_feed', function($table)
        {
            $table->dropColumn('description');
        });
    }
}
