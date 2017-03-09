<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelPackages6 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_packages', function($table)
        {
            $table->text('modal')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_packages', function($table)
        {
            $table->dropColumn('modal');
        });
    }
}
