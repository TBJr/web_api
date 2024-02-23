<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable=['fecha_reserva','cantidad_personas','estado'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function excursion():BelongsTo
    {
        return $this->belongsTo(Excursion::class);
    }

    public function payment():HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
