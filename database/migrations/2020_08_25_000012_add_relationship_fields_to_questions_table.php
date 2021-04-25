<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuestionsTable extends Migration
{
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedInteger('quiz_id');
            $table->foreign('quiz_id', 'quiz_fk_2064594')->references('id')->on('quizzes');
        });
    }
}