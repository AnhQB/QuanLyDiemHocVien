<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectPrequisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_prequisites', function (Blueprint $table) {
            $table->bigInteger('major_id')->unsigned();
            $table->bigInteger('subject_id')->unsigned();
            $table->bigInteger('subject_prequisite')->unsigned();
            $table->boolean('status')->default(1);
            $table->primary([
                'major_id',
                'subject_id',
                'subject_prequisite',
            ],'subject_prequisite_primary');

            $table->foreign('major_id',)
                    ->references('id')
                    ->on('majors');
            $table->foreign('subject_id',)
                    ->references('id')
                    ->on('subjects');
            $table->foreign('subject_prequisite')
                    ->references('id')
                    ->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject__prequisites');
    }
}
