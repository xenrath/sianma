<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loket extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'petugas_id',
    ];

    public function petugas()
    {
        return $this->belongsTo(User::class);
    }

    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }
}
