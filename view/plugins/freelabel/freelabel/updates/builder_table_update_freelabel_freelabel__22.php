<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabel22 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->date('due_date')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->date('due_date')->nullable(false)->change();
        });
    }
}
