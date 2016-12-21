<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabel20 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->string('file1', 300)->nullable()->change();
            $table->string('file2', 300)->nullable()->change();
            $table->string('file3', 300)->nullable()->change();
            $table->string('file4', 300)->nullable()->change();
            $table->string('file5', 300)->nullable()->change();
            $table->string('file6', 300)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->string('file1', 300)->nullable(false)->change();
            $table->string('file2', 300)->nullable(false)->change();
            $table->string('file3', 300)->nullable(false)->change();
            $table->string('file4', 300)->nullable(false)->change();
            $table->string('file5', 300)->nullable(false)->change();
            $table->string('file6', 300)->nullable(false)->change();
        });
    }
}
