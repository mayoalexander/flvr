<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFreelabelFreelabelFeedGenres extends Migration
{
    public function up()
    {
        Schema::create('freelabel_freelabel_feed_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('post_id');
            $table->integer('genre_id');
            $table->primary(['post_id','genre_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freelabel_freelabel_feed_genres');
    }
}
