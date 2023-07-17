<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('footer')->nullable();
            $table->string('password')->nullable();
            $table->boolean('status')->nullable();
            $table->bigInteger('user_id')
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });

        Schema::create('surveys_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('order')->nullable();
            $table->string('content')->nullable();
            $table->integer('type')->nullable();
            $table->integer('minAnswers')->nullable();
            $table->integer('maxAnswers')->nullable();
            $table->boolean('displayWay')->nullable(); //sposób wyswietlania
            $table->boolean('required')->nullable();
        });

        Schema::create('surveys_questions_answer', function (Blueprint $table) {
            $table->id();
            $table->string('content')->nullable();
            $table->integer('order')->nullable();
        });

        Schema::create('surveys_as_questions', function (Blueprint $table) {
            $table->unsignedBigInteger('surveys_id');
            $table->unsignedBigInteger('questions_id');
            $table->foreign('surveys_id')
                ->references('id')
                ->on('surveys');
                //->onDelete('cascade');
            $table->foreign('questions_id')
                ->references('id')
                ->on('surveys_questions');
                //->onDelete('cascade');
            $table->primary(['surveys_id', 'questions_id']);
        });

        Schema::create('questions_as_answer', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id');
            $table->unsignedBigInteger('answer_id');
            $table->foreign('question_id')
                ->references('id')
                ->on('surveys_questions');
                //->onDelete('cascade');
            $table->foreign('answer_id')
                ->references('id')
                ->on('surveys_questions_answer');
                //->onDelete('cascade');
            $table->primary(['question_id', 'answer_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surveys');
        Schema::dropIfExists('surveys_questions');
        Schema::dropIfExists('surveys_questions_answer');
        Schema::dropIfExists('surveys_as_questions');
        Schema::dropIfExists('questions_as_answer');
    }
}
