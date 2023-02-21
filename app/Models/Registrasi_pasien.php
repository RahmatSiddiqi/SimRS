<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrasi_pasien extends Model
{
    use HasFactory;
    protected $primaryKey = 'no_rm';

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
    public function poli()
    {
        return $this->belongsTo(poli::class);
    }
    public function periksa_pasien()
    {
        return $this->hasOne(periksa_pasien::class);
    }
}
