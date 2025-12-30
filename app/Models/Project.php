<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'cover_image',
        'gallery_images',
        'published_at',
        'is_active',
        'is_featured',
        'views_count',
        'likes_count',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'gallery_images' => 'array',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class)->withTimestamps();
    }
}
