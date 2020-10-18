<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelJilidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_jilids', function (Blueprint $table) {
            $table->id();
            $table->integer('nomorJilid');
            $table->foreignId('idCerita');
            $table->foreign('idCerita')->references('id')->on('tabel_ceritas');
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
        Schema::dropIfExists('tabel_jilids');
    }
}
