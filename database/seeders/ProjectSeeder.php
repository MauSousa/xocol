<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Urban Coffee',
                'content' => 'E-commerce Platform',
                'cover_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBGYBs9gbGLF0bz5nAUWdeKHICAjLlkhpN0_5tNRfBOwiN54tHB5etn11ao3XcKG8WA5VhMEwzog2YUuM4Sk1iNTKbcDJObU4F18rm_JiHx-XRrXmrcANK38_eq4XyxsTk4JgAGcrcqT4usinXUWG2YVUHW8WwdC_rp0PmewsjbY6Q4a49NJaHU9gnof5X6AvP_wfdNxUoEWN3LX3W5igTKzt0PpzLIRNfmwgWdWHd--SPbKc74aq9H9uWq_7kSip4oToDVj9SvWJk',
                'published_at' => '2023-06-01 00:00:00',
            ],
            [
                'title' => 'Nexus App',
                'content' => 'SaaS Application',
                'cover_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBxmFr_Gmfqez06oRMCHVTnTokddgLvrPDyNiA1wEBrq5rnET1e9GJRcz9wSYavpFusCfKDXbN-xXO-InmnKxP7WqBkRlLjAfP_ki_2eS2aiF2yIxoY51GOzWycST31s68GeyAlKRGxRV2Ab77RZtXRvbCzNkGhp8UtdT8YlQdD4N-5D4MbZJiYcEAqz8JUOj3EuDt4lzHPCPEV78_4eBG7VeZDwiwU6wSMmbo0DJj18BVOR8OOR3L_AovrpDnLW_lCr9n7UM-_3u8',
                'published_at' => '2023-03-15 00:00:00',
            ],
            [
                'title' => 'Solaris Identity',
                'content' => 'Corporate Branding',
                'cover_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAdKBT62QGIebVuVe3X6ajSrVX2GVk1OkxrIsb2RX6LgW2MQoSJfUEVsUvcRz0pZ9aYPNS26gE-9MSQLwhCpeB3JRu1U0oxbobH0R72sS8ZH6oB_83TpFMJYZvdDfVpxAdpaDPOOMS5RaCD5BQmVtpwXQ2hnElY8VN5EgTNJfDfkt1YKpahl0CafWgXYeB2CISMuogtHCDKhOBb2G-cet4JfB8Pwh_-XDB8OvEQkuWIAMceY-g29a-hDhEvf64nRuJTh5JXwSf-pHw',
                'published_at' => '2022-10-01 00:00:00',
            ],
            [
                'title' => 'Vogue Style',
                'content' => 'Web Design',
                'cover_image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAy0InDnJC99EhV3KRxYCLhXP_JjOqluJ233N9VkU84L_n5bFBIt7vKCUAVYOI_CDmlJk9leuhDLpxLI32ETMur00kz-S3JZCNcScUscVsERP-eT61r1QIos-gNk6IjT5MSMDNJViPEKRrcTIdhkQtvRVMYuC68ylRnWIfjFc3WjbZ6KKX83pH7OUJJyIdzfl9cHESiE6AtfoUTS0N6mdz860nHie3Pu5cNrh5GDcIhbh40ve_rHj2k7lIsxalcfVkGGZtpZXSP-rA',
                'published_at' => '2022-05-20 00:00:00',
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(
                ['slug' => Str::slug($project['title'])],
                [
                    'title' => $project['title'],
                    'slug' => Str::slug($project['title']),
                    'content' => $project['content'],
                    'cover_image' => $project['cover_image'],
                    'gallery_images' => [],
                    'published_at' => $project['published_at'],
                    'is_active' => true,
                    'is_featured' => true,
                ]
            );
        }
    }
}
