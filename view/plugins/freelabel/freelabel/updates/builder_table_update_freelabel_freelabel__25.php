<?php namespace Freelabel\Freelabel\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelabelFreelabel25 extends Migration
{
    public function up()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->string('photo_social', 200)->nullable();
            $table->string('photo_background', 200)->nullable();
            $table->dropColumn('photo_social_card');
            $table->dropColumn('alternate_photo');
        });
    }
    
    public function down()
    {
        Schema::table('freelabel_freelabel_', function($table)
        {
            $table->dropColumn('photo_social');
            $table->dropColumn('photo_background');
            $table->string('photo_social_card', 200)->nullable();
            $table->string('alternate_photo', 200)->nullable();
        });
    }
}
