<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PCPartSpecs extends Model
{
    use HasFactory;

    protected $table = 'pc_part_specs';

    const TYPE_ICONS = [
        'motherboard'      => 'img/icons/motherboard.png',
        'processor'        => 'img/icons/processor.jpg',
        'processor cooler' => 'img/icons/heatsink.jpg',
        'memory'           => 'img/icons/ram.jpg',
        'graphics card'    => 'img/icons/vga-card.jpg',
        'storage'          => 'img/icons/ssd.png',
        'power supply'     => 'img/icons/power-supply.jpg',
        'case'             => 'img/icons/computer-case.png',
    ];

    public function get_icon() {
        return asset(self::TYPE_ICONS[$this->type]);
    }

    public function get_details() {
        if ($this->type == 'motherboard') {
            return [
                'Socket' => $this->cpu_socket,
                'Form Factor' => $this->mobo_form_factor,
                'Ram Slots' => $this->mobo_ram_slots,
            ];
        }

        if ($this->type == 'processor') {
            return [
                'Cores' => $this->cpu_core_count,
                'Threads' => $this->cpu_thread_count,
                'Core Clock' => $this->cpu_core_clock . ' GHz',
                'Boost Clock' => $this->cpu_boost_clock . ' GHz',
                'Socket' => $this->cpu_socket,
                'Series' => $this->cpu_series,
                'TDP' => $this->cpu_power . ' W',
                'Integrated GPU' => $this->cpu_igpu_name,
            ];
        }

        if ($this->type == 'processor cooler') {
            return [
                'Socket' => $this->cpu_socket,
            ];
        }

        if ($this->type == 'memory') {
            return [
                'Memory' => $this->ram_gigabytes . ' GB',
                'Type' => $this->ram_type,
                'Speed' => $this->ram_speed . ' MHz',
            ];
        }

        if ($this->type == 'graphics card') {
            $vram = $this->gpu_vram_gigabytes;
            if ($vram < 1.0)
                $vram = ($vram * 1024) . ' MB';
            else
                $vram .= ' GB';

            return [
                'Memory' => $vram,
                'Memory Type' => $this->gpu_vram_type,
                'Core Clock' => $this->gpu_core_clock . ' MHz',
                'Boost Clock' => $this->gpu_boost_clock . ' MHz',
                'TDP' => $this->gpu_power . ' W',
            ];
        }

        if ($this->type == 'storage') {
            $capacity = $this->storage_capacity;
            if ($capacity >= 1024)
                $capacity = ($capacity / 1024) . ' TB';
            else
                $capacity .= ' GB';

            return [
                'Capacity' => $capacity,
                'Type' => $this->storage_type,
            ];
        }

        if ($this->type == 'power supply') {
            return [
                'Wattage' => $this->psu_wattage . ' W',
                'Efficiency Rating' => $this->psu_efficiency_rating,
                'Type' => $this->psu_type,
            ];
        }

        if ($this->type == 'case') {
            return [
                'Type' => $this->case_type,
                'Side Panel' => $this->case_side_panel,
            ];
        }

        return [];
    }

    public function articles()
    {
        return $this->belongsToMany(
            Article::class, 'article_specs', 'specs_id', 'article_id'
        )->withTimestamps();
    }
}
