<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'author_name' => 'Sarah Johnson',
                'author_title' => 'CEO, TechFlow',
                'quote' => 'XOCOL transformed our digital presence completely. Their strategic approach to our rebrand increased our leads by 40% in the first month.',
                'avatar_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAYkO4HTWnUxDrIUKjxJC8HQlGCiEPuFurXJClM4Fkfp1ARTdSyEDcOX0XIuofvtgxhZl2Bh_OTU5NDVL9WRXXRqpnzqnymDKjsNfsjLijldG6nI_L-zVii3S8LCr3M6V3lMggvPgJeQfBJLlTNEJmmFOPLOnmwQUWMYHlVem4Ckc10QVDnMRPonTZch9aYBxxhJOYjQgdcF4P_xlgAc4lVImv0w91jDTSzwRd3qZZzXxB8nEI6E5WliGWrw6Xh2Owm_RhStFIxXHE',
                'rating' => 5,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'author_name' => 'Michael Chen',
                'author_title' => 'Founder, Urban Coffee',
                'quote' => 'The web development team is top-notch. They delivered a complex e-commerce platform ahead of schedule with flawless execution.',
                'avatar_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCpKEcpXJHm1ll8zvQF07KWZ8-ZNIDDeVjNrGgUl7c2xum24vo-koErM6FBARA91_yuTZotV8qPUH4gd935NMUSJHPku1QjtA1tc65RSEmb89GHPSPpyw99QtqFh3phz539E-D6ddrxYy0ETXCNUvwDu2FoNmws2COLwAlJVoY-3b8gjz-ZjCIEJIKJR11ByYEKNAwTjazWpxP-wDTrsGjiscUZhR3BQdWQD84h6BcFd98fAI_RCodewHMWgH6q8AA2nPe1k8Xp5Tc',
                'rating' => 5,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'author_name' => 'Elena Rodriguez',
                'author_title' => 'CMO, Solaris',
                'quote' => "Creative, responsive, and data-driven. XOCOL isn't just an agency, they are a partner in our growth strategy.",
                'avatar_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC2mcMwiRvV46xTj3wOkFbJP2VGihD7jXa5Zt4rgrZkLzwGhpjkbt73vBXDk5UhrXggZ1fiiu9GKu1DQoijsx8C9jLkKt--nAnMiY_kvtfpIYfVZuKXI4dp1lBHCuVVlW7p85zqe0s9SMIstneeIpCgXo7QIFi7xRUZDODVYhW0f7MPk5luvZCApX-uXyQL4BClAAyBnRdFABxOFvMOHRgM5RI2XiO4Ksdpib_A2nDdgOWIWZSDHVWBV5ujsGn9at7hkCKGqKIQLwk',
                'rating' => 5,
                'sort_order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['author_name' => $testimonial['author_name']],
                $testimonial
            );
        }
    }
}
