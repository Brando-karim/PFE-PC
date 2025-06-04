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
        Schema::create('pc_part_specs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // color, rgb...
            $table->enum('type', [
                'motherboard',
                'processor',
                'processor cooler',
                'memory',
                'graphics card',
                'storage',
                'power supply',
                'case'
            ]);
            // Motherboard & CPU & Cooler
            $table->enum('cpu_socket', ['AM4', 'AM5'])->nullable();
            // Motherboard
            $table->enum('mobo_form_factor', ['ATX', 'Micro ATX', 'Mini ITX'])
                  ->nullable();
            $table->enum('mobo_ram_slots', ['2', '4'])->nullable();
                // max memory, pcie slots...
            // CPU
            $table->integer('cpu_core_count')->nullable();
            $table->integer('cpu_thread_count')->nullable();
            $table->float('cpu_core_clock')->nullable(); // GHz
            $table->float('cpu_boost_clock')->nullable();
            $table->string('cpu_series')->nullable(); // I don't have time for enum
            $table->integer('cpu_power')->nullable();
            $table->string('cpu_igpu_name')->nullable();
                // microarchitecture, cache size, max memory, memory types...
            // RAM
            $table->integer('ram_gigabytes')->nullable();
            $table->enum('ram_type', ['DDR3', 'DDR4', 'DDR5'])->nullable();
            $table->integer('ram_speed')->nullable(); // MHz
            // GPU
            $table->float('gpu_vram_gigabytes')->nullable();
            $table->enum('gpu_vram_type', ['GDDR5', 'GDDR6', 'GDDR7'])
                  ->nullable();
            $table->integer('gpu_core_clock')->nullable(); // MHz
            $table->integer('gpu_boost_clock')->nullable();
            $table->integer('gpu_power')->nullable();
                // interface, frame sync, bandwidth...
            // Storage
            $table->integer('storage_capacity')->nullable(); // GB
            $table->enum('storage_type', ['HDD', 'SATA SSD', 'NVMe SSD'])
                  ->nullable();
                // cache, interface...
            // PSU
            $table->integer('psu_wattage')->nullable();
            $table->enum('psu_efficiency_rating', [
                '80+', '80+ Bronze', '80+ Gold', '80+ Platinium', '80+ Titanium'
            ])->nullable();
            $table->enum('psu_type', ['ATX', 'Mini ITX'])->nullable();
            // Case
            $table->enum('case_type', [
                'ATX Full Tower', 'ATX Mid Tower', 'MicroATX Mid Tower',
                'MicroATX Mini Tower', 'Mini ITX Desktop'
            ])->nullable();
            $table->enum('case_side_panel', [
                'None', 'Acrylic', 'Mesh', 'Tempered Glass',
                'Tinted Tempered Glass'
            ])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pc_part_specs');
    }
};
