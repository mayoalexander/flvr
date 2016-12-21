<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFreelabelFreelabelPackages extends Migration
{
    public function up()
    {
        Schema::create('freelabel_freelabel_packages', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 300);
            $table->integer('price');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freelabel_freelabel_packages');
    }
}
