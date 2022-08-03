<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDateOfBirth2StudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('students', 'date_of_birth')) {
            Schema::table('students', function (Blueprint $table) {
                $table->date('date_of_birth')->nullable()->after('avatar');
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
        if(Schema::hasColumn('students','date_of_birth')){
            Schema::table('students', function (Blueprint $table) {
                $table->dropColumn('date_of_birth');
            });
        }
    }
}
