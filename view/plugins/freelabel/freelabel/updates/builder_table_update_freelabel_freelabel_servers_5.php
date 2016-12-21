<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelServers5 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_servers', function($table)
        {
            $table->string('github_url', 255)->nullable();
            $table->string('domain', 255)->nullable()->change();
            $table->string('sql_username', 255)->nullable()->change();
            $table->string('sql_key', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_servers', function($table)
        {
            $table->dropColumn('github_url');
            $table->string('domain', 255)->nullable(false)->change();
            $table->string('sql_username', 255)->nullable(false)->change();
            $table->string('sql_key', 255)->nullable(false)->change();
        });
    }
}
