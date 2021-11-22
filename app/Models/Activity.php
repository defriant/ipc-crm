<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'aktifitas';
    protected $fillable = [
        'user_id',
        'jenis',
        'aktifitas',
        'url',
        'updated_at'
    ];
}
