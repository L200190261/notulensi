<?php

namespace App\Models;

use App\Models\asn;
use App\Models\nonasn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class bidang extends Model
{
    use HasFactory;
    protected $guarded = ['id_bidang'];

    public function bidang()
    {
        return $this->hasMany(asn::class);
    }
    public function non_bidang()
    {
        return $this->hasMany(nonasn::class);
    }
}
