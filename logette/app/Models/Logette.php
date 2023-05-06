<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logette extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function courants()
    {
        return $this->hasMany(Courant::class, 'logette_id', 'id');
    }
    public function tensions()
    {
        return $this->hasMany(Tension::class, 'logette_id', 'id');
    }
    public function energies()
    {
        return $this->hasMany(Energie::class, 'logette_id', 'id');
    }
    public function puissances()
    {
        return $this->hasMany(Puissance::class, 'logette_id', 'id');
    }
}
