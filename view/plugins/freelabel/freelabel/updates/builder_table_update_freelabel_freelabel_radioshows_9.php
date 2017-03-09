<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelRadioshows9 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_radioshows', function($table)
        {
            $table->string('timezone');
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_radioshows', function($table)
        {
            $table->dropColumn('timezone');
        });
    }
}
