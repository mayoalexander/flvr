<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelMarketing2 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_marketing', function($table)
        {
            $table->string('path')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_marketing', function($table)
        {
            $table->dropColumn('path');
        });
    }
}
