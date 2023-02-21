<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    protected $primaryKey = 'no_rm';

    public function registrasi_pasien()
    {

        return $this->hasMany(Registrasi_pasien::class);
    }
}
