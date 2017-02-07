<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFreelabelFreelabelGenres extends Migration
{
    public function up()
    {
        Schema::create('freelabel_freelabel_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('genre_id');
            $table->string('title');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freelabel_freelabel_genres');
    }
}
