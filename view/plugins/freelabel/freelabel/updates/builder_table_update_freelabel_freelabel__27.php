<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabel27 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->string('photo_logo', 400)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->dropColumn('photo_logo');
        });
    }
}
