<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Portfolio extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'portfolio_category_id',
        'is_published',
        'media'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($portfolio) {
            $portfolio->slug = Str::slug($portfolio->title);
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('portfolio_images')->useDisk('public');
    }

    public function category()
    {
        return $this->belongsTo(PortfolioCategory::class);
    }
}
