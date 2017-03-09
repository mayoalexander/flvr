<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelRadioshows8 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_radioshows', function($table)
        {
            $table->string('start_time')->nullable()->unsigned(false)->default(null)->change();
            $table->string('end_time')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_radioshows', function($table)
        {
            $table->time('start_time')->nullable()->unsigned(false)->default(null)->change();
            $table->time('end_time')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
