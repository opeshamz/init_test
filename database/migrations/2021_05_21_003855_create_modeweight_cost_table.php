<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModeweightCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modeweight_costs', function (Blueprint $table) {
            $table->id();
            $table->integer('aircost');
            $table->integer('watercost');
            $table->integer('airweightcost');
            $table->integer('waterweightcost');
            $table->integer('uk');
            $table->integer('us');
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
        Schema::dropIfExists('modeweight_cost');
    }
}
