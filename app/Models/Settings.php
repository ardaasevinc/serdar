<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_logo',
        'favicon',
        'site_email',
        'site_phone',
        'site_address',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'meta_image',
        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'youtube_url',
        'google_tag_manager',
        'google_analytics',
        'facebook_pixel',
        'tiktok_pixel',
        'custom_css',
        'custom_js',
        'maintenance_mode',
        'maintenance_message',
    ];
}
