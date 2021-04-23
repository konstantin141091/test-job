<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('имяб марка');
            $table->string('number')->comment('номер');
            $table->unsignedMediumInteger('year')->comment('год выпуска');
            $table->enum('status', ['free', 'busy', 'close'])->default('free')->comment('статус');
            $table->string('data')->comment('данные');
            $table->string('osago')->comment('осаго');
            $table->string('license')->comment('лицензия');
            $table->string('color')->comment('цвет');
            $table->unsignedTinyInteger('time_accounting')->comment('время учета');
            $table->unsignedBigInteger('mileage')->comment('пробег');
            $table->unsignedBigInteger('service')->comment('до то');

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
        Schema::dropIfExists('cars');
    }
}
