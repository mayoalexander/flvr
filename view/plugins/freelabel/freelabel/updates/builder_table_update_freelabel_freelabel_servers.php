<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelServers extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_servers', function($table)
        {
            $table->string('user', 225)->nullable();
            $table->string('remote_path', 255)->nullable();
            $table->string('ip_address', 255)->nullable()->change();
            $table->string('key', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_servers', function($table)
        {
            $table->dropColumn('user');
            $table->dropColumn('remote_path');
            $table->string('ip_address', 255)->nullable(false)->change();
            $table->string('key', 255)->nullable(false)->change();
        });
    }
}
