<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sebarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId("provinsi_id")->constrained()->cascadeOnDelete("cascade");
            $table->string("treated");
            $table->string("confirmation");
            $table->string("healed");
            $table->string("die");
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
        Schema::dropIfExists('sebarans');
    }
};
