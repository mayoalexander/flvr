<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabelVenues extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_venues', function($table)
        {
            $table->string('name')->nullable();
            $table->string('city')->nullable();
            $table->text('state')->nullable();
            $table->string('address')->nullable();
            $table->string('zipcode');
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_venues', function($table)
        {
            $table->dropColumn('name');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('address');
            $table->dropColumn('zipcode');
            $table->increments('id')->unsigned()->change();
        });
    }
}
