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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');

            $table->integer('gaji_pokok');
            $table->integer('tunjangan_makan')->default(0);
            $table->integer('tunjangan_transportasi')->default(0);
            $table->integer('potongan')->default(0);
            $table->integer('gaji_bersih');

            $table->tinyInteger('bulan');
            $table->year('tahun');

            // satu karyawan hanya boleh punya satu slip gaji perbulan dan pertahun
            $table->unique(['employee_id', 'bulan', 'tahun']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};
