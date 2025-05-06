<?php

namespace App\Models;

use App\PhotoDelete\HasImageDeleting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory, HasImageDeleting;

    protected $fillable = [
        'page_id',
        'title',
        'content',
        'image',
        'order',
        'meta_keywords',
        'meta_description',
    ];

    protected array $imageFields = ['image']; // Silinecek görsel alanı

    // Page ile ilişki
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
