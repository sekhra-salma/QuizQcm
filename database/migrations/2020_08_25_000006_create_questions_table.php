<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description');
            $table->string('a_option')->nullable();
            $table->string('b_option')->nullable();
            $table->string('c_option')->nullable();
            $table->string('d_option')->nullable();
            $table->string('correct_answer')->nullable();
            $table->string('explain')->nullable();
            $table->string('correct_answer_2')->nullable();
            $table->float('time')->nullable();
            $table->float('mark', 15, 2);
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}