<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','descripcion'];

    public function excursions():BelongsToMany
    {
       return $this->belongsToMany(Excursion::class);
    }
}
