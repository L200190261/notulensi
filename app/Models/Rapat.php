<?php

namespace App\Models;

use App\Models\asn;
use App\Models\User;
use App\Models\nonasn;
use App\Models\Notulen;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rapat extends Model
{
    use HasFactory;
    protected $fillable = ([
        'id_rapat', 'user_id', 'id_asn', 'id_non', 'tempat', 'hari', 'tanggal', 'jam', 'status', 'keterangan', 'penyelenggara'
    ]);

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function asn()
    {
        return $this->belongsToMany(asn::class, 'id_asn', 'id_asn');
    }
    public function nonasn()
    {
        return $this->BelongsToMany(nonasn::class, 'id_non', 'id_non');
    }
    public function notulen()
    {
        return $this->hasMany(Notulen::class);
    }
}
