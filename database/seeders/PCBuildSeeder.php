<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PCBuild;
use App\Models\Article;

class PCBuildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $build = PCBuild::create(
            ['name' => 'Ryzen 5 5600G 16GB Ram 1TB NVMe GeForce RTX 3060 12GB']
        );
        $build->articles()->attach([
            Article::where('Titre', 'MSI B550M-A PRO ProSeries Motherboard')->first()->id,
            Article::where('Titre', 'AMD Ryzen™ 5 5600G 6-Core 12-Thread Desktop Processor with Radeon™ Graphics')->first()->id,
            Article::where('Titre', 'CORSAIR VENGEANCE LPX DDR4 RAM 16GB (2x8GB) 3200MHz CL16')->first()->id,
            Article::where('Titre', 'GeForce RTX 3060 Ventus 2X 12G OC')->first()->id,
            Article::where('Titre', 'Kingston NV3 1 TB M.2-2280 PCIe 4.0 X4 NVME Solid State Drive')->first()->id,
            Article::where('Titre', 'MSI MAG A550BN Gaming Power Supply - 80 Plus Bronze Certified 550W')->first()->id,
            Article::where('Titre', 'Cooler Master MasterBox Q300L Micro-ATX Tower')->first()->id,
        ]);
    }
}
