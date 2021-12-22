<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusPatients extends Migration
{
    public function up()
    {
        // membuat table status_patients
        Schema::create('status_patients', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Positive', 'Recovered', 'Dead']);
            $table->timestamps();
        });
    }

    public function down()
    {
        // menghapus table status_patients jika sebelumnya sudah ada
        Schema::dropIfExists('status_patients');
    }
}
