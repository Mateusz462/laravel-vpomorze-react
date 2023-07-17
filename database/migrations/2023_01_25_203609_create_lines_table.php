<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); //numer linii
            $table->boolean('suspended')->nullable();
            $table->boolean('technic')->nullable();
            $table->boolean('change_route')->nullable();
            $table->timestamps();
        });

        Schema::create('lines_routes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();//numer wariantu linii
            $table->string('direction')->nullable();
            $table->string('kilometers')->nullable(); //rezultat z danych
            $table->string('points')->nullable(); //indywidualna stawka kilometrowa danej trasy
            $table->boolean('status')->nullable();
            $table->bigInteger('lines_id')
                ->foreign('lines_id')
                ->references('id')
                ->on('lines');
            $table->timestamps();
        });

        Schema::create('lines_routes_busstops', function (Blueprint $table) {
            $table->id();
            $table->string('busstop')->nullable();
            $table->string('assignment')->nullable();
            $table->string('minutes')->nullable(); //rezultat czasu przejazdu
            $table->string('day_type')->nullable();
            //liczenie km danej trasy i czasu przejazdu
            $table->string('time')->nullable(); //godzina przystanku
            $table->string('odometer')->nullable();//licznik km
            $table->bigInteger('lines_id')
                ->foreign('lines_id')
                ->references('id')
                ->on('lines');
        });

        Schema::create('stints', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('day_type')->nullable();
        });

        Schema::create('stints_brigade', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();//numer brygady
            $table->string('typ_pojazdu')->nullable();
            $table->boolean('night')->nullable();
            $table->boolean('old_vehicles')->nullable();
            $table->string('time_departure')->nullable();
            $table->string('time_exit')->nullable();
            $table->bigInteger('stints_id')
                ->foreign('stints_id')
                ->references('id')
                ->on('stints');
            $table->bigInteger('carriers_id')
                ->foreign('carriers_id')
                ->references('id')
                ->on('carriers');
            $table->timestamps();
        });

        Schema::create('stints_brigade_courses', function (Blueprint $table) {
            $table->id();
            $table->string('assignment')->nullable();
            $table->string('time_departure')->nullable();
            $table->string('place_change')->nullable();
            $table->bigInteger('stints_id')
                ->foreign('stints_id')
                ->references('id')
                ->on('stints');
            $table->bigInteger('carriers_id')
                ->foreign('carriers_id')
                ->references('id')
                ->on('carriers');
            $table->bigInteger('lines_id')
                ->foreign('lines_id')
                ->references('id')
                ->on('lines');
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
        Schema::dropIfExists('stints_brigade_courses');
        Schema::dropIfExists('stints_brigade');
        Schema::dropIfExists('stints');

        Schema::dropIfExists('lines_routes_busstops');
        Schema::dropIfExists('lines_routes');
        Schema::dropIfExists('lines');
    }
}
