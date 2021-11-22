<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyRegis extends Model
{
    use HasFactory;
    protected $table = 'company_regis';
    protected $fillable = [
        'leader_name',
        'company_name',
        'npwp', 'address',
        'user_id',
        'surat_permohonan',
        'foto_npwp',
        'status',
        'cek_npwp',
        'cek_surat'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
