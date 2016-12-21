<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabel13 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->string('file1', 300);
            $table->string('file2', 300);
            $table->string('file3', 300);
            $table->string('file4', 300);
            $table->string('file5', 300);
            $table->string('file6', 300);
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->dropColumn('file1');
            $table->dropColumn('file2');
            $table->dropColumn('file3');
            $table->dropColumn('file4');
            $table->dropColumn('file5');
            $table->dropColumn('file6');
        });
    }
}
