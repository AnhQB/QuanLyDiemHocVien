<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_groups', function (Blueprint $table) {
            $table->string('group_id');
            $table->bigInteger('subject_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->primary([
                'group_id',
                'subject_id',
                'student_id',
            ]);
            $table->foreign('group_id')
                ->references('id')
                ->on('groups');
            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects');
            $table->foreign('student_id')
                ->references('id')
                ->on('students');
//            $table->foreignId('class_id')->constrained()->primary();
//            $table->foreignId('subject_id')->constrained()->primary();
//            $table->foreignId('student_id')->constrained()->primary();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_groups');
    }
}
