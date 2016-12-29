<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFreelabelFreelabelRadioshows extends Migration
{
    public function up()
    {
        Schema::create('freelabel_freelabel_radioshows', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('photo')->nullable();
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freelabel_freelabel_radioshows');
    }
}
