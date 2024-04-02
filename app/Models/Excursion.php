<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Excursion extends Model
{
    use HasFactory;

    protected $fillable =['nombre','descripcion','fecha_inicio','hola_salida','fecha_fin','hora_regreso','precio_entrada','precio_final','capacidad_max'];

    public function reservations():HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function opinions():HasMany
    {
       return $this->hasMany(Opinion::class);
    }

    public function places():BelongsToMany
    {
       return $this->belongsToMany(Place::class);
    }

    public function images():MorphToMany
    {
        return $this->morphToMany(Image::class,'imageable');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
