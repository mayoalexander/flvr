<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFreelabelFreelabelFeed extends Migration
{
    public function up()
    {
        Schema::create('freelabel_freelabel_feed', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freelabel_freelabel_feed');
    }
}
