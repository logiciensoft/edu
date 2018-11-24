<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_subject', function (Blueprint $table) {
            $table->unsignedInteger('quiz_id')->index();
            $table->unsignedInteger('subject_id')->index();
        });

        Schema::table('quiz_subject', function (Blueprint $table) {
            $table->foreign('quiz_id')
                ->references('id')->on('quizzes')
                ->onDelete('cascade');

            $table->foreign('subject_id')
                ->references('id')->on('subjects')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_subject');
    }
}
