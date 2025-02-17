<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $table = 'about'; // Eğer Laravel varsayılan 'abouts' ismini kullanmasını istemiyorsan

    protected $fillable = ['title', 'content1', 'content2', 'image1', 'image2',' is_published'];
}
