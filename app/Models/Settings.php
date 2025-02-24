<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value'];

    public $timestamps = false;

    // Key'e göre değer getiren fonksiyon
    public static function getSetting($key, $default = null)
    {
        return self::where('key', $key)->value('value') ?? $default;
    }
}

