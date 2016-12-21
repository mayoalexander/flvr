<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelServers2 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_servers', function($table)
        {
            $table->string('nickname', 255);
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_servers', function($table)
        {
            $table->dropColumn('nickname');
        });
    }
}
