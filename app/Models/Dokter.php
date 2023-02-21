<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $primaryKey = 'kd_dokter';

    public $incrementing = false;


    protected $keyType = 'string';

    public function poli()
    {
        return $this->belongsTo(poli::class);
    }
    public function periksa_pasien()
    {
        return $this->hasMany(periksa_pasien::class);
    }
}
