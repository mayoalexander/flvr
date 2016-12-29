<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFreelabelFreelabelScript extends Migration
{
    public function up()
    {
        Schema::create('freelabel_freelabel_script', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('type')->nullable();
            $table->text('text')->nullable();
            $table->smallInteger('order')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freelabel_freelabel_script');
    }
}
