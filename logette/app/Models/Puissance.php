<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puissance extends Model
{
    use HasFactory;

    protected $fillable = [
        'puissance',
        'logette_id'
    ];

    public function logette()
    {
        return $this->belongsTo(Logette::class, 'logette_id', 'id');
    }
}
