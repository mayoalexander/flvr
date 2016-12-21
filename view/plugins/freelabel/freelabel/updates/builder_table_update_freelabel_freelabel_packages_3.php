<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelPackages3 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_packages', function($table)
        {
            $table->text('subtitle')->nullable();
            $table->text('description')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_packages', function($table)
        {
            $table->dropColumn('subtitle');
            $table->dropColumn('description');
        });
    }
}
