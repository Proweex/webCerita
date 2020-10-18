<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelBabsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_babs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idJilid');
            $table->foreign('idJilid')->references('id')->on('tabel_jilids');
            $table->integer('nomorBab');
            $table->string('judulBab', 255);
            $table->mediumText('textsCerita');
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
        Schema::dropIfExists('tabel_babs');
    }
}
