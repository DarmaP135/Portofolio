<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nomor extends Model
{
    use HasFactory;
    protected $fillable = [
        'olahraga_id',
        'nomor',


    ];

    public function Olga()
    {
        return $this->belongsTo(Olahraga::class, 'olahraga_id');
    }

    public function perolehan()
    {
        return $this->hasMany(Perolehan::class);
    }
}
