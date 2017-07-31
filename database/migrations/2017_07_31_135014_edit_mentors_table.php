<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditMentorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mentors', function(Blueprint $table){
            $table->string('linkedin')
                  ->after('name');
            $table->string('web_link')
                  ->after('name');
            $table->string('image_path')
                  ->after('name');
            $table->dropColumn('position');
            $table->dropColumn('email');     
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
            $table->dropColumn('linkedin');
            $table->dropColumn('web_link');
            $table->dropColumn('image_path');
        });
    }
}
