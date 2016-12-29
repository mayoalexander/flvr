<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelRadioshows2 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_radioshows', function($table)
        {
            $table->string('description')->nullable()->change();
            $table->string('host_name')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_radioshows', function($table)
        {
            $table->string('description', 255)->nullable(false)->change();
            $table->string('host_name', 255)->nullable(false)->change();
        });
    }
}
