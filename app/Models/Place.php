<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','descripcion','images'];

    public function excursions():BelongsToMany
    {
       return $this->belongsToMany(Excursion::class);
    }

    public function images():MorphtoMany
    {
        return $this->morphToMany(Image::class,'imageable');
    }
}
