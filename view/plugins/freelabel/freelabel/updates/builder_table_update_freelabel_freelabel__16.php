<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabel16 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->renameColumn('product_type', 'type');
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->renameColumn('type', 'product_type');
        });
    }
}
