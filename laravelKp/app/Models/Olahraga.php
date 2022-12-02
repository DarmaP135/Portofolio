<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Olahraga extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
    ];

    public function Nocabor()
    {
        return $this->hasMany(Nomor::class);
    }

    public function perolehan()
    {
        return $this->hasMany(Perolehan::class);
    }
}
