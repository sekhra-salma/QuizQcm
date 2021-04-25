<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAnswersTable extends Migration
{
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->unsignedInteger('student_id');
            $table->foreign('student_id', 'student_fk_2064595')->references('id')->on('users');
            $table->unsignedInteger('question_id');
            $table->foreign('question_id', 'question_fk_2064596')->references('id')->on('questions');
        });
    }
}