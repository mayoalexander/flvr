<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelServers4 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_servers', function($table)
        {
            $table->string('sql_username');
            $table->string('sql_key');
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_servers', function($table)
        {
            $table->dropColumn('sql_username');
            $table->dropColumn('sql_key');
        });
    }
}
