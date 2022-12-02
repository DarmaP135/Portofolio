<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'acara_id',
        'nama',
    ];

    public function Acara()
    {
        return $this->belongsTo(Acara::class, 'acara_id');
    }

    public function Perolehan()
    {
        return $this->hasMany(Perolehan::class);
    }
}
