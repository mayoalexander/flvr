<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFreelabelFreelabelVenues extends Migration
{
    public function up()
    {
        Schema::create('freelabel_freelabel_venues', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freelabel_freelabel_venues');
    }
}
