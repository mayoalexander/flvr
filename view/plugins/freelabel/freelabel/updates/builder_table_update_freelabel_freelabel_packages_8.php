<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelPackages8 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_packages', function($table)
        {
            $table->renameColumn('modal', 'modal_form');
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_packages', function($table)
        {
            $table->renameColumn('modal_form', 'modal');
        });
    }
}
