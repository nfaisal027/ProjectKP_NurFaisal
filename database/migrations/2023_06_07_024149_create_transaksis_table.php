<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('faktur');
            $table->string('code')->nullable();
            $table->foreignId('user_id');
            $table->string('nama');
            $table->string('no_hp');
            $table->integer('berat');
            $table->text('alamat_lengkap');
            $table->string('status');
            $table->string('kurir');
            $table->bigInteger('ongkir');
            $table->bigInteger('total');
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
        Schema::dropIfExists('transaksis');
    }
}
