<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableGradeAddColumnSlot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('grades','slot')){
            Schema::table('grades', function (Blueprint $table) {
                    $table->smallInteger('slot')->after('grade');
                });
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn('grades','slot')){
            Schema::table('grades', function (Blueprint $table) {
                $table->dropColumn('slot');
            });
        }
    }
}
