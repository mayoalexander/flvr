<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelMarketing extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_marketing', function($table)
        {
            $table->string('type')->nullable();
            $table->increments('id')->unsigned(false)->change();
            $table->string('photo')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_marketing', function($table)
        {
            $table->dropColumn('type');
            $table->increments('id')->unsigned()->change();
            $table->string('photo', 255)->nullable(false)->change();
        });
    }
}
