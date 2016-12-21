<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabel21 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->string('cta_button', 100)->nullable()->change();
            $table->string('subtitle_text', 400)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->string('cta_button', 100)->nullable(false)->change();
            $table->string('subtitle_text', 400)->nullable(false)->change();
        });
    }
}
