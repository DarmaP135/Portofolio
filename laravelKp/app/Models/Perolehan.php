<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perolehan extends Model
{
    use HasFactory;

    protected $fillable = [
        'acara_id',
        'atletl_id',
        'olahraga_id',
        'nomor_id',
        'nama_atlet',
        'medali',
    ];

    public function Kegiatan()
    {
        return $this->belongsTo(Acara::class, 'acara_id');
    }
    public function atlet()
    {
        return $this->belongsTo(Atlet::class, 'atletl_id');
    }
    public function olga()
    {
        return $this->belongsTo(Olahraga::class, 'olahraga_id');
    }
    public function nomor()
    {
        return $this->belongsTo(Nomor::class, 'nomor_id');
    }
}
