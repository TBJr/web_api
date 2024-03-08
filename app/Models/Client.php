<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Client extends Model
{
    use HasFactory;

    protected $fillable=['nombre','email','direccion','telefono'];
    
    // public function user():HasOne
    // {
    //     return $this->hasOne(User::class);
    // }

    public function reservations():HasMany
    {
        return $this->hasMany(Reservation::class);
    }


    public function opinions():HasMany
    {
        return $this->hasMany(Opinion::class);
    }
}
