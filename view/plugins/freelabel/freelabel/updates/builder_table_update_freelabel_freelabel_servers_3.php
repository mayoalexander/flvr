<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelServers3 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_servers', function($table)
        {
            $table->renameColumn('nickname', 'domain');
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_servers', function($table)
        {
            $table->renameColumn('domain', 'nickname');
        });
    }
}
