<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tension extends Model
{
    use HasFactory;

    protected $fillable = [
        'tension1',
        'tension2',
        'tension3',
        'logette_id'
    ];

    public function logette()
    {
        return $this->belongsTo(Logette::class, 'logette_id', 'id');
    }
}
