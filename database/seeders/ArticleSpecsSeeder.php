<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\PCPartSpecs;
use App\Models\ArticleSpecs;

class ArticleSpecsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Motherboards
        ArticleSpecs::createFromNames(
            'MSI B550M-A PRO ProSeries Motherboard', 'MSI B550M-A PRO'
        );
        ArticleSpecs::createFromNames(
            'MSI PRO -B760', 'MSI PRO-B760'
        );
        ArticleSpecs::createFromNames(
            'B450M DS3H', 'B450M DS3H'
        );
        ArticleSpecs::createFromNames(
            'ASUS B450M - PLUS', 'ASUS B450M-PLUS'
        );
        ArticleSpecs::createFromNames(
            'B650SE -AORUS', 'B650SE-AORUS'
        );

        // Processors
        ArticleSpecs::createFromNames(
            'AMD Ryzen™ 5 5600G 6-Core 12-Thread Desktop Processor with Radeon™ Graphics',
            'AMD Ryzen 5 5600G'
        );
        ArticleSpecs::createFromNames(
            'Intel 7 12700 k', 'Intel Core i7-12700K'
        );
        ArticleSpecs::createFromNames(
            'Ryzen 9 950X3D', 'AMD Ryzen 9 950X3D'
        );
        ArticleSpecs::createFromNames(
            'Intel 9 14900k', 'Intel Core i9-14900K'
        );

        // CPU Coolers
        ArticleSpecs::createFromNames(
            'AMD Wraith Stealth', 'AMD Wraith Stealth'
        );
        ArticleSpecs::createFromNames(
            'Cooler Master Hyper 212', 'Cooler Master Hyper 212'
        );
        ArticleSpecs::createFromNames(
            'NZXT Kraken X53', 'NZXT Kraken X53'
        );

        // Memory
        ArticleSpecs::createFromNames(
            'CORSAIR VENGEANCE LPX DDR4 RAM 16GB (2x8GB) 3200MHz CL16',
            '8GB DDR4 3200 MHz'
        );
        ArticleSpecs::createFromNames(
            'XPG DDR5 16GB', 'XPG DDR5 16GB'
        );
        ArticleSpecs::createFromNames(
            'KINGSTON FURY DDR4 16GB', 'KINGSTON FURY DDR4 16GB'
        );
        ArticleSpecs::createFromNames(
            'TOUGHRAM DDR4 16GB RGB', 'TOUGHRAM DDR4 16GB RGB'
        );

        // Graphics Cards
        ArticleSpecs::createFromNames(
            'GeForce RTX 3060 Ventus 2X 12G OC',
            'GeForce RTX 3060 12GB'
        );
        ArticleSpecs::createFromNames(
            'RTX 5090', 'RTX 5090'
        );
        ArticleSpecs::createFromNames(
            'RTX 5070 TI', 'RTX 5070 TI'
        );
        ArticleSpecs::createFromNames(
            'RX 9070', 'RX 9070'
        );

        // Storage
        ArticleSpecs::createFromNames(
            'Kingston NV3 1 TB M.2-2280 PCIe 4.0 X4 NVME Solid State Drive',
            '1TB NVMe SSD'
        );
        ArticleSpecs::createFromNames(
            'SG SATA3 SSD256GB', 'SG SATA3 SSD256GB'
        );
        ArticleSpecs::createFromNames(
            'LEXAR 512SSD', 'LEXAR 512SSD'
        );
        ArticleSpecs::createFromNames(
            'Samsung SSD 2TB', 'Samsung SSD 2TB'
        );

        // Power Supplies
        ArticleSpecs::createFromNames(
            'MSI MAG A550BN Gaming Power Supply - 80 Plus Bronze Certified 550W',
            '550W 80+ Bronze'
        );
        ArticleSpecs::createFromNames(
            'MSI MPG A850G', 'MSI MPG A850G'
        );
        ArticleSpecs::createFromNames(
            'Corsair RM1000x', 'Corsair RM1000x'
        );

        // Cases
        ArticleSpecs::createFromNames(
            'Cooler Master MasterBox Q300L Micro-ATX Tower',
            'MicroATX Mini Tower Acrylic'
        );
        ArticleSpecs::createFromNames(
            'ONE PIECE CASE', 'ONE PIECE CASE'
        );
        ArticleSpecs::createFromNames(
            'EVANGELION CASE', 'EVANGELION CASE'
        );
        ArticleSpecs::createFromNames(
            'ASUS ROG STRIX CASE', 'ASUS ROG STRIX CASE'
        );
    }
}
