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
            $table->bigInteger('class_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->primary([
                'class_id',
                'subject_id',
                'student_id',
            ]);
            $table->foreign('class_id')
                    ->references('id')
                    ->on('classes');
            $table->foreign('subject_id')
                    ->references('id')
                    ->on('subjects');
            $table->foreign('student_id')
                    ->references('id')
                    ->on('students');
//            $table->foreignId('class_id')->constrained()->primary();
//            $table->foreignId('subject_id')->constrained()->primary();
//            $table->foreignId('student_id')->constrained()->primary();

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
        Schema::dropIfExists('student_groups');
    }
}
