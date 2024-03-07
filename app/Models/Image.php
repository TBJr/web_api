<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\MorphToMany;


class Image extends Model
{
    use HasFactory;

    
    protected $fillable = ['url'];

    public function excursions():MorphToMany
    {
        return $this->morphedByMany(Excursion::class,'imageable');
    }

    public function places():MorphToMany
    {
        return $this->morphedByMany(Place::class,'imageable');
    }

 
}
