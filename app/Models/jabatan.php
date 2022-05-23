<?php

namespace App\Models;

use App\Models\asn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class jabatan extends Model
{
    protected $guarded = ['id_jabatan'];

    public function jabatan()
    {
        return $this->hasMany(asn::class);
    }
}
