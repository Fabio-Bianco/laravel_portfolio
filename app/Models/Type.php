<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Type model
 * 
 * simplified: added ordered() scope for reusable query logic
 */
class Type extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'sort_order'];

    // simplified: added scope for ordering
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
