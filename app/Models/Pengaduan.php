<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = 'pengaduan';
    protected $fillable = [
        'id',
        'user_id',
        'perihal',
        'nama',
        'perusahaan',
        'email',
        'tanggal',
        'aplikasi',
        'kegiatan',
        'permasalahan',
        'status',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
