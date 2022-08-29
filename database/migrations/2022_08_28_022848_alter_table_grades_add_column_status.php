<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableGradesAddColumnStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('grades','status')){
            Schema::table('grades', function (Blueprint $table) {
                    $table->smallInteger('status')->after('grade')->default(1)->comment('StatusGradeExam');
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
        if(Schema::hasColumn('grades','status')){
            Schema::table('grades', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
}
