<?php

namespace App\Models;

use App\PhotoDelete\HasImageDeleting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory, HasImageDeleting;

    protected $fillable = [
        'title1',
        'title2',
        'content',
        'image',
    ];

    protected array $imageFields = ['image']; // Silinecek görsel alanı
}
