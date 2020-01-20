<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('choice_id')->references('id')->on('choices');
            $table->foreign('questionnaire_execution_id')->references('id')->on('questionnaire_executions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
            $table->dropForeign(['choice_id']);
            $table->dropForeign(['questionnaire_execution_id']);
        });
    }
}
