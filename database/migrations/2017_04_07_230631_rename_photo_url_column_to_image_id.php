<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePhotoUrlColumnToImageId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('paths', function (Blueprint $table) {
            $table->renameColumn('photo_url', 'image_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('paths', function (Blueprint $table) {
            $table->renameColumn('image_id', 'photo_url');
        });
    }
}
