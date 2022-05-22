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
            $table->bigInteger('subject_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
//            $table->foreignId('subject_id')->constrained()->primary();
//            $table->foreignId('student_id')->constrained()->primary();
            $table->smallInteger('exam_form')->comment('GradeExamFormEnum')->index();
            $table->string('semester_year');
            $table->primary([
                'subject_id',
                'student_id',
                'exam_form',
                'semester_year',
            ]);
            $table->integer('time');
            $table->float('grade');
            $table->foreign('subject_id')
                    ->references('id')
                    ->on('subjects');
            $table->foreign('student_id')
                    ->references('id')
                    ->on('students');
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
