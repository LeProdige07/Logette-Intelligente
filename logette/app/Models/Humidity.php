<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Humidity extends Model
{
    use HasFactory;

    protected $fillable = [
        'humidity',
        'logette_id'
    ];

    public function logette()
    {
        return $this->belongsTo(Logette::class, 'logette_id', 'id');
    }
}
