<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();

           
            $table->unsignedBigInteger('buku_id');
            $table->foreign('buku_id')
                ->references('id')
                ->on('bukus')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->date('tanggal');
            $table->integer('eksemplar');
            $table->timestamps();

            $table->engine = 'InnoDB'; 
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
