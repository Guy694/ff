<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpIndicators extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exp_indicators', function (Blueprint $table) {
            $table->bigIncrements('exind_id');
            $table->string('exind_num_name');
            $table->string('exind_name');
            $table->string('value_type');
            $table->string('num2562');
            $table->string('num2563');
            $table->string('target2564');
            $table->bigInteger('parent_id');
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
        Schema::dropIfExists('exp_indicators');
    }
}