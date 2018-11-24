<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTutorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_tutorial', function (Blueprint $table) {
            $table->unsignedInteger('tutorial_id')->index();
            $table->unsignedInteger('subject_id')->index();
        });

        Schema::table('subject_tutorial', function (Blueprint $table) {
            $table->foreign('tutorial_id')
                ->references('id')->on('tutorials')
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
        Schema::dropIfExists('subject_tutorial');
    }
}
