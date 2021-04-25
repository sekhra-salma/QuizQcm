<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToQuizzesTable extends Migration
{
    public function up()
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->unsignedInteger('teacher_id');
            $table->foreign('teacher_id', 'teacher_fk_2064593')->references('id')->on('users');
        });
    }
}