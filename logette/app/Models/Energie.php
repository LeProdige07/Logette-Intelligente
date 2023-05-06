<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Energie extends Model
{
    use HasFactory;

    public function logette()
    {
        return $this->belongsTo(Logette::class, 'logette_id', 'id');
    }
}
