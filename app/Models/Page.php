<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'type', 'is_published', 'parent_menu_id'];

    // Slug Otomatik Oluşturma
    public static function boot()
    {
        parent::boot();
        static::creating(function ($page) {
            $page->slug = Str::slug($page->title);
        });

        static::updating(function ($page) {
            $page->slug = Str::slug($page->title);
        });
    }

    // Üst Menü (Eğer varsa)
    public function parentMenu()
    {
        return $this->belongsTo(Page::class, 'parent_menu_id');
    }

    // Alt Menüleri Getir
    public function submenus()
    {
        return $this->hasMany(Page::class, 'parent_menu_id');
    }

    // İçerikleri Getir
    public function contents()
    {
        return $this->hasMany(PageContent::class);
    }
}
