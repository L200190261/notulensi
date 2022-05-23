<?php

namespace App\Models;

use App\Models\asn;
use App\Models\Rapat;
use App\Models\nonasn;
use App\Models\Notulen;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'username', 'password', 'role'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function nonasn()
    {
        return $this->hasOne(nonasn::class);
    }

    public function rapat()
    {
        return $this->hasMany(Rapat::class);
    }
    public function asn()
    {
        return $this->hasOne(asn::class);
    }
    public function notulen()
    {
        return $this->hasMany(Notulen::class);
    }
}
