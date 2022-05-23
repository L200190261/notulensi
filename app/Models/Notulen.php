<?php

namespace App\Models;

use App\Models\User;
use App\Models\Rapat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notulen extends Model
{
    use HasFactory;

    protected $guarded = ['id_notulensi'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function rapat()
    {
        return $this->belongsTo(Rapat::class);
    }
}
