<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMajorSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('major_subjects', function (Blueprint $table) {
            $table->foreignId('major_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->smallInteger('semester_major');
        });

        Schema::table('major_subjects', function (Blueprint $table) {
            $table->primary([
                'major_id',
                'subject_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('major_subjects');
    }
}
