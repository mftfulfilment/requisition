<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('requisitionNo');
            $table->string('AgentName');
            $table->string('region');
            $table->integer('AgentPhone');
            $table->string('RequisitionerName');
            $table->string('RequisitionerEmail');
            $table->integer('RequisitionerPhone');
            $table->string('feedback')->default('Not disbursed');
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
        Schema::dropIfExists('agents');
    }
}
