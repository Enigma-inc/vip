<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditSlideshowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('slideshows', function (Blueprint $table) {
            $table->string('button_link')->nullable()->change();
            $table->string('button_text')->after('button_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('slideshows', 'button_text'))
        {
            Schema::table('slideshows', function (Blueprint $table)
            {
                $table->dropColumn('button_text');
            });
        }
    }
}
