<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDutiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duties', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('type')->nullable();
            $table->integer('status')->nullable();
            $table->integer('change')->default(1);
            $table->boolean('isKzw')->default(false);
            $table->boolean('is_reserve_assigned')->default(false);
            $table->string('reason');
            $table->string('remarks');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('dysp_id');
            $table->unsignedBigInteger('bus_id');
            $table->unsignedBigInteger('stint_id');
            $table->unsignedBigInteger('canc_id')->nullable();
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
        Schema::dropIfExists('duties');
    }
}
