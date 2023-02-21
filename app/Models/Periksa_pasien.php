<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periksa_pasien extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_rawat';
    public $incrementing = false;


    protected $keyType = 'string';

    public function registrasi_pasien()
    {
        return $this->belongsTo(registrasi_pasien::class);
    }
    public function dokter()
    {
        return $this->belongsTo(dokter::class);
    }
}
