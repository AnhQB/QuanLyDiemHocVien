<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
//            $table->foreignId('subject_id')->constrained()->primary();
//            $table->foreignId('student_id')->constrained()->primary();
            $table->smallInteger('exam_type')->comment('GradeExamTypeEnum');
            $table->string('semester_year');
            $table->integer('time');
            $table->primary([
                'student_id',
                'subject_id',
                'exam_type',
                'semester_year',
                'time'
            ],'primary_key_grade_table');

            $table->float('grade');
            $table->foreign('subject_id')
                ->references('id')
                ->on('subjects');
            $table->foreign('student_id')
                ->references('id')
                ->on('students');
//            $table->foreign('exam_type')
//                ->references('exam_type')
//                ->on('subjects');

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
        Schema::dropIfExists('grades');
    }
}
