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
        'slug',
        'type_id',
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