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
        Schema::create('riwayat_aksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surat_pengajuan_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('aksi', ['created', 'updated', 'deleted', 'approved', 'rejected']);
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('surat_pengajuan_id')->references('id')->on('surat_pengajuan_dana')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_aksi');
    }
};
