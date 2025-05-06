<?php

namespace App\Models;

use App\PhotoDelete\HasImageDeleting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory, HasImageDeleting;

    protected $fillable = [
        'name',
        'image',
        'url',
        'is_active',
    ];

    protected array $imageFields = ['image']; // Silinecek görsel alanı

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
