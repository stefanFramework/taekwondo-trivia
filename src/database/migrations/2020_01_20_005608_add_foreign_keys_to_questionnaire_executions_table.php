<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToQuestionnaireExecutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questionnaire_executions', function (Blueprint $table) {
            $table->foreign('questionnaire_id')->references('id')->on('questionnaires');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questionnaire_executions', function (Blueprint $table) {
            $table->dropForeign(['questionnaire_id']);
            $table->dropForeign(['user_id']);
        });
    }
}
