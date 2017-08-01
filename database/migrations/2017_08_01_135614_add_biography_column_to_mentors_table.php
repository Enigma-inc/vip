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
        Schema::table('mentors', function(Blueprint $table){
            $table->dropColumn('web_link');
            $table->string('website_link')
                  ->nullable()
                  ->after('name'); 
            $table->string('bio')
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
            $table->dropColumn('web_link');
            $table->dropColumn('bio');
        });
    }
}
