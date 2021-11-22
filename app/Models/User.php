<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Cache;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'profile',
        'company_status',
        'role'
    ];

    public function company()
    {
        return $this->hasOne('App\Models\Company');
    }

    public function companyregis()
    {
        return $this->hasOne('App\Models\CompanyRegis');
    }

    public function pengaduan()
    {
        return $this->hasOne('App\Models\Pengaduan');
    }

    public function tanggapan()
    {
        return $this->hasMany('App\Models\Tanggapan');
    }

    // Check if user is online
    public function isOnline()
    {
        return Cache::has('user-is-online-'.$this->id);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
