<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableGroupsAddColumnSemesterYear extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('groups','semester_year')){
            Schema::table('groups', function (Blueprint $table) {
                    $table->string('semester_year')->after('major_id');
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
        if(Schema::hasColumn('groups','semester_year')){
            Schema::table('groups', function (Blueprint $table) {
                $table->dropColumn('semester_year');
            });
        }
    }
}
