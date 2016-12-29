<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelScript extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_script', function($table)
        {
            $table->string('title', 200)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_script', function($table)
        {
            $table->dropColumn('title');
        });
    }
}
