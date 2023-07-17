<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacations', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('type')->nullable();
            $table->date('date_from');
            $table->date('date_to');
            $table->string('numberofdays')->default(0);
            $table->string('reason');
            $table->integer('status');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('approved_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacations');
    }
}
