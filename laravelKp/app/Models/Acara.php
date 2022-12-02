<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tahun',

    ];



    public function perolehan()
    {
        return $this->hasMany(Perolehan::class);
    }

    public function atlet()
    {
        return $this->hasMany(Atlet::class);
    }

    public function total()
    {
        return $this->hasMany(Total::class);
    }
}
