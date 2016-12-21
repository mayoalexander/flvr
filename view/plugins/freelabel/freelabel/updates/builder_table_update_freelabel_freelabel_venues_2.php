<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelVenues2 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_venues', function($table)
        {
            $table->string('phone');
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_venues', function($table)
        {
            $table->dropColumn('phone');
        });
    }
}
