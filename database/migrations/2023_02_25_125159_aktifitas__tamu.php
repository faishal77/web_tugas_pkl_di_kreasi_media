<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Aktifitas_Tamus', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('name', 100);       
            $table->string('date_time')->nullable();  
            $table->string('KegiatanTamu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
