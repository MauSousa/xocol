<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            'Identidad & Branding',
            'Estrategia Digital',
            'Marketing Digital',
            'Desarrollo Web',
        ];

        foreach ($services as $index => $name) {
            Service::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'description' => 'Servicio base de XOCOL.',
                    'icon' => null,
                    'is_active' => true,
                    'sort_order' => $index + 1,
                ]
            );
        }
    }
}
