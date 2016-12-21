<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFreelabelFreelabelServers extends Migration
{
    public function up()
    {
        Schema::create('freelabel_freelabel_servers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('ip_address');
            $table->string('hostname');
            $table->string('key');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freelabel_freelabel_servers');
    }
}
