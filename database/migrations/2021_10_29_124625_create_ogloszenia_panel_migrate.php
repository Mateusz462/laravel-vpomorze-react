<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOgloszeniaPanelMigrate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annouments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('date_n');
            $table->string('date_to');
            $table->string('text');
            $table->integer('discord');
            $table->integer('is_pinned');
            $table->integer('status');
            $table->bigInteger('user_id')
            ->foreign('user_id')
            ->references('id')
            ->on('users');
            $table->timestamps();
        });

        Schema::create('annouments_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('color');
        });

        Schema::create('tags_has_annouments', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('ann_id');

            $table->foreign('tag_id')
                ->references('id')
                ->on('annouments_tags');
                //->onDelete('cascade');

            $table->foreign('ann_id')
                ->references('id')
                ->on('annouments');
                //->onDelete('cascade');

            $table->primary(['tag_id', 'ann_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags_has_annouments');
        Schema::dropIfExists('annouments_tags');
        Schema::dropIfExists('annouments');
    }
}
