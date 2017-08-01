<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlideImagePathToApplicationSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('application_sessions', function(Blueprint $table){
            $table->string('slide_image_path')
                  ->after('closing_date');
            $table->dropColumn('slide_image');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_sessions',function(Blueprint $table){
            $table->dropColumn('slide_image_path');
        });
    }
}
