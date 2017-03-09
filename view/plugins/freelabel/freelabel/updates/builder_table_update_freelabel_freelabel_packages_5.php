<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelPackages5 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_packages', function($table)
        {
            $table->string('frequency')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_packages', function($table)
        {
            $table->dropColumn('frequency');
        });
    }
}
