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
    ];

    protected $casts = [
        'updated_at_github' => 'datetime',
        'stargazers_count' => 'integer',
        'forks_count' => 'integer',
        'watchers_count' => 'integer',
    ];

    

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