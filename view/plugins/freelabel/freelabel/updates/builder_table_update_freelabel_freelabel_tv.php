<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelTv extends Migration
{
    public function up()
    {
        Schema::rename('freelabel_freelabel_feed', 'freelabel_freelabel_tv');
    }
    
    public function down()
    {
        Schema::rename('freelabel_freelabel_tv', 'freelabel_freelabel_feed');
    }
}
