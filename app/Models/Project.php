<?php
// Modello Project per CRUD Portfolio
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Campi assegnabili via mass assignment
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'link',
    ];
}
