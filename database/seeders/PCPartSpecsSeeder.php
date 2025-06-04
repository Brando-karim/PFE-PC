<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PCPartSpecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Motherboards
        DB::table('pc_part_specs')->insert([
            [
                'name' => 'MSI B550M-A PRO',
                'type' => 'motherboard',
                'cpu_socket' => 'AM4',
                'mobo_form_factor' => 'Micro ATX',
                'mobo_ram_slots' => '2'
            ],
            [
                'name' => 'MSI PRO-B760',
                'type' => 'motherboard',
                'cpu_socket' => 'LGA 1700',
                'mobo_form_factor' => 'ATX',
                'mobo_ram_slots' => '4'
            ],
            [
                'name' => 'B450M DS3H',
                'type' => 'motherboard',
                'cpu_socket' => 'AM4',
                'mobo_form_factor' => 'Micro ATX',
                'mobo_ram_slots' => '4'
            ],
            [
                'name' => 'ASUS B450M-PLUS',
                'type' => 'motherboard',
                'cpu_socket' => 'AM4',
                'mobo_form_factor' => 'Micro ATX',
                'mobo_ram_slots' => '4'
            ],
            [
                'name' => 'B650SE-AORUS',
                'type' => 'motherboard',
                'cpu_socket' => 'AM5',
                'mobo_form_factor' => 'ATX',
                'mobo_ram_slots' => '4'
            ]
        ]);

        // CPUs
        DB::table('pc_part_specs')->insert([
            [
                'name' => 'AMD Ryzen 5 5600G',
                'type' => 'processor',
                'cpu_socket' => 'AM4',
                'cpu_core_count' => 6,
                'cpu_thread_count' => 12,
                'cpu_core_clock' => 3.9,
                'cpu_boost_clock' => 4.4,
                'cpu_series' => 'AMD Ryzen 5',
                'cpu_power' => 65,
                'cpu_igpu_name' => 'Radeon Vega 7',
            ],
            [
                'name' => 'Intel Core i7-12700K',
                'type' => 'processor',
                'cpu_socket' => 'LGA 1700',
                'cpu_core_count' => 12,
                'cpu_thread_count' => 20,
                'cpu_core_clock' => 3.6,
                'cpu_boost_clock' => 5.0,
                'cpu_series' => 'Intel Core i7',
                'cpu_power' => 125,
                'cpu_igpu_name' => 'Intel UHD Graphics 770',
            ],
            [
                'name' => 'AMD Ryzen 9 950X3D',
                'type' => 'processor',
                'cpu_socket' => 'AM5',
                'cpu_core_count' => 16,
                'cpu_thread_count' => 32,
                'cpu_core_clock' => 4.2,
                'cpu_boost_clock' => 5.7,
                'cpu_series' => 'AMD Ryzen 9',
                'cpu_power' => 120,
                'cpu_igpu_name' => 'Radeon Graphics',
            ],
            [
                'name' => 'Intel Core i9-14900K',
                'type' => 'processor',
                'cpu_socket' => 'LGA 1700',
                'cpu_core_count' => 24,
                'cpu_thread_count' => 32,
                'cpu_core_clock' => 3.2,
                'cpu_boost_clock' => 6.0,
                'cpu_series' => 'Intel Core i9',
                'cpu_power' => 125,
                'cpu_igpu_name' => 'Intel UHD Graphics 770',
            ]
        ]);

        // CPU Coolers
        DB::table('pc_part_specs')->insert([
            [
                'name' => 'AMD Wraith Stealth',
                'type' => 'processor cooler',
                'cpu_socket' => 'AM4',
            ],
            [
                'name' => 'Cooler Master Hyper 212',
                'type' => 'processor cooler',
                'cpu_socket' => 'AM4, LGA 1700',
            ],
            [
                'name' => 'NZXT Kraken X53',
                'type' => 'processor cooler',
                'cpu_socket' => 'AM4, AM5, LGA 1700',
            ]
        ]);

        // RAMs
        DB::table('pc_part_specs')->insert([
            [
                'name' => '8GB DDR4 3200 MHz',
                'type' => 'memory',
                'ram_gigabytes' => 8,
                'ram_type' => 'DDR4',
                'ram_speed' => 3200,
            ],
            [
                'name' => 'XPG DDR5 16GB',
                'type' => 'memory',
                'ram_gigabytes' => 16,
                'ram_type' => 'DDR5',
                'ram_speed' => 5600,
            ],
            [
                'name' => 'KINGSTON FURY DDR4 16GB',
                'type' => 'memory',
                'ram_gigabytes' => 16,
                'ram_type' => 'DDR4',
                'ram_speed' => 3600,
            ],
            [
                'name' => 'TOUGHRAM DDR4 16GB RGB',
                'type' => 'memory',
                'ram_gigabytes' => 16,
                'ram_type' => 'DDR4',
                'ram_speed' => 3600,
            ]
        ]);

        // GPUs
        DB::table('pc_part_specs')->insert([
            [
                'name' => 'GeForce RTX 3060 12GB',
                'type' => 'graphics card',
                'gpu_vram_gigabytes' => 12,
                'gpu_vram_type' => 'GDDR6',
                'gpu_core_clock' => 1320,
                'gpu_boost_clock' => 1777,
                'gpu_power' => 170,
            ],
            [
                'name' => 'RTX 5090',
                'type' => 'graphics card',
                'gpu_vram_gigabytes' => 24,
                'gpu_vram_type' => 'GDDR7',
                'gpu_core_clock' => 2500,
                'gpu_boost_clock' => 3000,
                'gpu_power' => 450,
            ],
            [
                'name' => 'RTX 5070 TI',
                'type' => 'graphics card',
                'gpu_vram_gigabytes' => 16,
                'gpu_vram_type' => 'GDDR7',
                'gpu_core_clock' => 2200,
                'gpu_boost_clock' => 2800,
                'gpu_power' => 300,
            ],
            [
                'name' => 'RX 9070',
                'type' => 'graphics card',
                'gpu_vram_gigabytes' => 16,
                'gpu_vram_type' => 'GDDR7',
                'gpu_core_clock' => 2300,
                'gpu_boost_clock' => 2900,
                'gpu_power' => 320,
            ]
        ]);

        // Storages
        DB::table('pc_part_specs')->insert([
            [
                'name' => '1TB NVMe SSD',
                'type' => 'storage',
                'storage_capacity' => 1024,
                'storage_type' => 'NVMe SSD',
            ],
            [
                'name' => 'SG SATA3 SSD256GB',
                'type' => 'storage',
                'storage_capacity' => 256,
                'storage_type' => 'SATA SSD',
            ],
            [
                'name' => 'LEXAR 512SSD',
                'type' => 'storage',
                'storage_capacity' => 512,
                'storage_type' => 'SATA SSD',
            ],
            [
                'name' => 'Samsung SSD 2TB',
                'type' => 'storage',
                'storage_capacity' => 2048,
                'storage_type' => 'NVMe SSD',
            ]
        ]);

        // PSUs
        DB::table('pc_part_specs')->insert([
            [
                'name' => '550W 80+ Bronze',
                'type' => 'power supply',
                'psu_wattage' => 550,
                'psu_efficiency_rating' => '80+ Bronze',
                'psu_type' => 'ATX',
            ],
            [
                'name' => 'MSI MPG A850G',
                'type' => 'power supply',
                'psu_wattage' => 850,
                'psu_efficiency_rating' => '80+ Gold',
                'psu_type' => 'ATX',
            ],
            [
                'name' => 'Corsair RM1000x',
                'type' => 'power supply',
                'psu_wattage' => 1000,
                'psu_efficiency_rating' => '80+ Gold',
                'psu_type' => 'ATX',
            ]
        ]);

        // Cases
        DB::table('pc_part_specs')->insert([
            [
                'name' => 'MicroATX Mini Tower Acrylic',
                'type' => 'case',
                'case_type' => 'MicroATX Mini Tower',
                'case_side_panel' => 'Acrylic',
            ],
            [
                'name' => 'ONE PIECE CASE',
                'type' => 'case',
                'case_type' => 'ATX Mid Tower',
                'case_side_panel' => 'Tempered Glass',
            ],
            [
                'name' => 'EVANGELION CASE',
                'type' => 'case',
                'case_type' => 'ATX Mid Tower',
                'case_side_panel' => 'Tempered Glass',
            ],
            [
                'name' => 'ASUS ROG STRIX CASE',
                'type' => 'case',
                'case_type' => 'ATX Mid Tower',
                'case_side_panel' => 'Tempered Glass',
            ]
        ]);
    }
}
