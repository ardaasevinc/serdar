<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Fatma extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug', 'is_published'];

    // Slug otomatik oluşturulsun
    public static function boot()
    {
        parent::boot();
        static::creating(function ($fatma) {
            $fatma->slug = Str::slug($fatma->title);
        });
    }
}
