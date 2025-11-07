<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'link',
        'github_url',
        'demo_url',
        'slug',
        'type_id',
        'stargazers_count',
        'forks_count',
        'watchers_count',
        'updated_at_github',
        'is_published',
        'is_featured',
        'display_order',
        'featured_order',
    ];

    protected $casts = [
        'updated_at_github' => 'datetime',
        'stargazers_count' => 'integer',
        'forks_count' => 'integer',
        'watchers_count' => 'integer',
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'display_order' => 'integer',
        'featured_order' => 'integer',
    ];

    

    // Scopes per filtraggio visibilità
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true)->where('is_published', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc')
            ->orderByDesc('updated_at_github')
            ->orderByDesc('updated_at')
            ->orderByDesc('created_at')
            ->orderByDesc('id');
    }

    public function type()
    {
        return $this->belongsTo(\App\Models\Type::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(\App\Models\Technology::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}