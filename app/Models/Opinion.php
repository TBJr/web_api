<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Opinion extends Model
{
    use HasFactory;

    protected $fillable = ['puntuacion', 'comentario', 'opinions'];

    public function client():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function excursion():BelongsTo
    {
        return $this->belongsTo(Excursion::class);
    }

    public function services() {
        return $this->hasMany(Service::class);
    }
}
