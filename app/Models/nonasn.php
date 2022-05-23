<?php

namespace App\Models;

use App\Models\User;
use App\Models\Rapat;
use App\Models\bidang;
use App\Models\instansi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class nonasn extends Model
{
    use HasFactory;
    protected $guarded = ['id_non'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function instansi()
    {
        return $this->belongsTo(instansi::class, 'id_instansi', 'id_instansi');
    }
    public function bidang()
    {
        return $this->belongsTo(bidang::class, 'id_bidang', 'id_bidang');
    }
    public function rapat()
    {
        return $this->belongsToMany(Rapat::class, 'id_rapat', 'id_rapat');
    }
}
