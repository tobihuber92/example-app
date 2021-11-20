<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculators', function (Blueprint $table) {
            $table->id();
            $table->integer("Entfernung");
            $table->float("PreisProLiter");
            $table->float("Benzinverbrauch");
            $table->integer("AnzahlFahrer");
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
        Schema::dropIfExists('calculators');
    }
}
