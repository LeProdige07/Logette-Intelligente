<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courant extends Model
{
    use HasFactory;

    protected $fillable = [
        'courant1',
        'courant2',
        'courant3',
        'logette_id'
    ];

    public function logette()
    {
        return $this->belongsTo(Logette::class, 'logette_id', 'id');
    }
}
