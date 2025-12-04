<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'category'];

    protected $casts = [
        'category' => 'string',
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
