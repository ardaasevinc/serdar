<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_id',
        'title',
        'content',
        'image',
        'order',
        'meta_keywords',
        'meta_description'
    ];

    // Page ile ilişki
    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
