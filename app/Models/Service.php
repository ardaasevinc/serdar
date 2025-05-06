<?php

namespace App\Models;

use App\PhotoDelete\HasImageDeleting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory, HasImageDeleting;

    protected $fillable = [
        'icon',
        'title',
        'content',
        'image',
        'is_published',
    ];

    protected array $imageFields = ['image']; // Silinecek görsel alanı
}
