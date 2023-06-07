<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    use HasFactory;

    protected $fillable = [
        'loket_id',
        'urutan',
        'status',
    ];

    public function loket()
    {
        return $this->belongsTo(Loket::class);
    }
}
