<?php

namespace App\Models;

use App\PhotoDelete\HasImageDeleting;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory, HasImageDeleting;

    protected $fillable = [
        // Genel
        'site_name',
        'site_email',
        'site_phone',

        // Logo ve Görseller
        'light_logo',
        'dark_logo',
        'favicon',

        // SEO
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',

        // Sosyal Medya
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'youtube_url',

        // Tracking Kodları
        'google_tag_manager',
        'google_analytics',
        'facebook_pixel',
        'tiktok_pixel',

        // Custom Kodlar
        'custom_css',
        'custom_js',

        // Bakım Modu
        'maintenance_mode',
        'maintenance_message',
    ];

    protected array $imageFields = [
        'light_logo',
        'dark_logo',
        'favicon',
        'meta_image',
    ]; // Otomatik silinecek görseller
}
