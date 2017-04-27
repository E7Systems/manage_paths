<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPathColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {	
        Schema::table('paths', function (Blueprint $table) {
            $table->integer('dop')->after('altitude');
            $table->float('image_direction')->after('dop');
            $table->string('latitude_ref')->after('latitude');
            $table->string('longitude_ref')->after('longitude');
            $table->dateTime('photo_taken_at')->after('image_id');
            $table->float('roll')->after('dop');
            $table->float('pitch')->after('roll');
            $table->float('yaw')->after('pitch');
            $table->string('rotation_matrix')->after('yaw');
            $table->string('quaternion')->after('rotation_matrix');
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
	        $table->dropColumn('dop');
	        $table->dropColumn('image_direction');
	        $table->dropColumn('latitude_ref');
	        $table->dropColumn('longitude_ref');
	        $table->dropColumn('photo_taken_at');
	        $table->dropColumn('roll');
	        $table->dropColumn('pitch');
	        $table->dropColumn('yaw');
	        $table->dropColumn('rotation_matrix');
	        $table->dropColumn('quaternion');
        });
    }
}
