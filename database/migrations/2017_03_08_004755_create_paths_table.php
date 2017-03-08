<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePathsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    
	    #http://www.astro.caltech.edu/~mcs/CBI/cbiscript/Altitude.html
	    #http://stackoverflow.com/questions/1196415/what-datatype-to-use-when-storing-latitude-and-longitude-data-in-sql-databases
	    
        Schema::create('paths', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->decimal('latitude',8,6);
            $table->decimal('longitude',9,6);
            $table->float('altitude');
            $table->string('photo_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paths');
    }
}
