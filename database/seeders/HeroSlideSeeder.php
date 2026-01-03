<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides = [
            [
                'title' => 'TechFlow Rebrand',
                'subtitle' => 'Featured Project',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAirr9fJ4-b9EITGljrRFdrkyMGSeVS0mLd1b2o2FoTbv6S97bxXQW1diR3Z_qhr2OCQJQcHwwgf1NzOgtKP1ZrHpZX-fjnl5aK2E-7DfcAGW7-3Lr2Y_iYFxV1MgOBXFHvo2W7p33h4g7lcWPr_3kH2_x4g0D-b99eOmzNLJbpY5sJuK6hd-xPwOQi9Kw2Y24KM9XhMUSkSa6-o67WQgrL9dTWgxzERLW7-qD7_72EE5vSnn5zT9Ec1OZqbBGfDRA6JYlYxvWZBoU',
                'cta_text' => 'View Case Studies',
                'cta_url' => '#',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Lumen Spaces',
                'subtitle' => 'Featured Project',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC9Xkvu4r52QhhXjfzeW8ozjuZFF0g0sHxJElY4gXoDgv5e-xt0M5t1B7_zMnOq86I2ljVf0bLm9-3UG3O4gU5nrgi-o2L-d5mFzwv25Z-31yECBDyGQzLHtEmfdoH8NjZ4aqdMmzJf66id4WACb0iEwn-OAx2M1CUaaNmlbUZYQ8uH0p8zeSt5YEtv5U1nK1Cq9gH3uLvg_hDuhbzcYAV8dLTpNh31N_yaTN6M3IC1R3p7IcBqBAU6ZNr6lcLXh7urc6oNnlG5peAw',
                'cta_text' => 'View Case Studies',
                'cta_url' => '#',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Pulse Interface',
                'subtitle' => 'Featured Project',
                'image_path' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAjmS4tVFLkRn9xAiSaoBAMFYb0WHf-RV1Kp08hu4WCbDt3gJw0NvRmUQ3U3ltiDjKdpq0f3EmL4v3PDAtaS7Zp2lfYkwoOEXAAx9AaAGQti5ImnflYVaxPXywB_GQ1seXP3-0bDY0NkWVo9hF_6GIR7KHz5G5fnAv2eAZaP2rbzRFm-M-mN9KZhVe3bku6BI6K_k_-S39Fea21BMvkYgXq6l1QASSMmrNVkgP7UpXw9kRI0RmAcC1K5pyPtKybSkQ2e9JzhEcKdeZE',
                'cta_text' => 'View Case Studies',
                'cta_url' => '#',
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::updateOrCreate(
                ['title' => $slide['title']],
                $slide
            );
        }
    }
}
