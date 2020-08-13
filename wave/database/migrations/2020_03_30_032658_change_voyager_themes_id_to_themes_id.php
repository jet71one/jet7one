<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeVoyagerThemesIdToThemesId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('theme_options', function (Blueprint $table) {
            $table->renameColumn('voyager_theme_id', 'theme_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('themes_id', function (Blueprint $table) {
            $table->renameColumn('theme_id', 'voyager_theme_id');
        });
    }
}
