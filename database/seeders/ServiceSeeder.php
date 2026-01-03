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
            [
                'name' => 'Branding & Identity',
                'description' => 'Creating memorable visual systems that tell your unique story.',
                'icon' => 'palette',
                'sort_order' => 1,
            ],
            [
                'name' => 'Digital Strategy',
                'description' => 'Data-driven growth plans to position your brand effectively.',
                'icon' => 'lightbulb',
                'sort_order' => 2,
            ],
            [
                'name' => 'Digital Marketing',
                'description' => 'Performance campaigns that convert traffic into loyal customers.',
                'icon' => 'monitoring',
                'sort_order' => 3,
            ],
            [
                'name' => 'Web Development',
                'description' => 'Custom websites and apps built for speed, scale, and performance.',
                'icon' => 'code',
                'sort_order' => 4,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['slug' => Str::slug($service['name'])],
                [
                    'name' => $service['name'],
                    'description' => $service['description'],
                    'icon' => $service['icon'],
                    'is_active' => true,
                    'sort_order' => $service['sort_order'],
                ]
            );
        }
    }
}
