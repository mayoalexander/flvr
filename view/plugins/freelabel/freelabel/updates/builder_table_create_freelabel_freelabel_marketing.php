<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFreelabelFreelabelMarketing extends Migration
{
    public function up()
    {
        Schema::create('freelabel_freelabel_marketing', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('photo');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freelabel_freelabel_marketing');
    }
}
