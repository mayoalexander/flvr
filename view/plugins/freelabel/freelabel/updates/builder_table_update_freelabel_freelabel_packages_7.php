<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelPackages7 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_packages', function($table)
        {
            $table->string('modal_button_text')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_packages', function($table)
        {
            $table->dropColumn('modal_button_text');
        });
    }
}
