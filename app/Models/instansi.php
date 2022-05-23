<?php

namespace App\Models;

use App\Models\asn;
use App\Models\nonasn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class instansi extends Model
{
    use HasFactory;

    protected $guarded = ['id_instansi'];

    public function instansi()
    {
        return $this->hasMany(asn::class);
    }
    public function non_instansi()
    {
        return $this->hasMany(nonasn::class);
    }
}
