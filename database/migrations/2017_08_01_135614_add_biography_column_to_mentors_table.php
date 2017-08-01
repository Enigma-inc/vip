<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBiographyColumnToMentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('mentors', 'web_link'))
        {
            Schema::table('mentors', function (Blueprint $table)
            {
                $table->dropColumn('web_link');
            });
        }

        Schema::table('mentors', function(Blueprint $table){


            
            $table->string('website_link')
                  ->nullable()
                  ->after('name'); 
            $table->text('bio')
                  ->after('name');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mentors',function(Blueprint $table){
            $table->dropColumn('website_link');
            $table->dropColumn('bio');
        });
    }
}
