<?php

namespace App\Models;

use App\PhotoDelete\HasImageDeleting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, HasImageDeleting;

    protected $fillable = [
        'title',
        'content',
        'image',
        'category_id',
        'is_published',
    ];

    protected array $imageFields = ['image']; // Silinecek görsel alanı

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
