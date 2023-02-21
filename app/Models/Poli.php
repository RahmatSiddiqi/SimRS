<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_poli';

    public function registrasi_pasien()
    {
        return $this->hasMany(Registrasi_pasien::class);
    }

    public function dokter()
    {
        return $this->hasMany(dokter::class);
    }
}
