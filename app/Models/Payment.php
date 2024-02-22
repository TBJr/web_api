<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    
    protected $fillable = ['monto','fecha_pago','metodo_pago'];

  

    public function reservation():BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }
}
