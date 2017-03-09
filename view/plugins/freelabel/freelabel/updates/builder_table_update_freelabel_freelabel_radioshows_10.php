<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelRadioshows10 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_radioshows', function($table)
        {
            $table->string('day_of_week')->nullable();
            $table->string('timezone')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_radioshows', function($table)
        {
            $table->dropColumn('day_of_week');
            $table->string('timezone', 255)->nullable(false)->change();
        });
    }
}
