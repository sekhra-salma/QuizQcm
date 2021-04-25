<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->float('mark', 15, 2);
            $table->string('answer')->nullable();
            $table->string('answer2')->nullable();
            $table->string('answer3')->nullable();
            $table->string('answer4')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}