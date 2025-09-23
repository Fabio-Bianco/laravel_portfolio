<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'slug'];

    public function projects()
    {
        return $this->belongsToMany(\App\Models\Project::class);
    }

    // Usa lo slug per il model binding implicito nelle route
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
