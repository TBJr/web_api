<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Excursion extends Model
{
    use HasFactory;
    
    protected $fillable =['nombre','descripcion','fecha_inicio','fecha_fin','precio_entrada','precio_final','capacidad_max'];

    public function reservations():HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function opinions():HasMany
    {
       return $this->hasMany(Opinion::class);
    }

    public function places():HasMany
    {
       return $this->hasMany(Place::class);
    }
}
