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
        Schema::create('detail_cluster', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cluster_id')->constrained('cluster');
            $table->foreignId('sebaran_id')->constrained('sebarans');
            $table->string("distance");
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
        //
    }
};
