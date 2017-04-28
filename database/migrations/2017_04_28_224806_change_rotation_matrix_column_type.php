<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRotationMatrixColumnType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('ALTER TABLE paths MODIFY COLUMN rotation_matrix TEXT');
        DB::statement('ALTER TABLE paths MODIFY COLUMN quaternion TEXT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('ALTER TABLE paths MODIFY COLUMN rotation_matrix VARCHAR(255)');
        DB::statement('ALTER TABLE paths MODIFY COLUMN quaternion VARCHAR(255)');
    }
}
