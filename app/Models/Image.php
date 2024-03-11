<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Image extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $fillable = ['url'];

    public function imageable()
    {
        return $this->morphTo();
    }
=======
    
    protected $fillable = ['url'];

>>>>>>> d67fe0a3c2469b5d59acf486414eb9fd2346953a
    public function excursions():MorphToMany
    {
        return $this->morphedByMany(Excursion::class,'imageable');
    }

    public function places():MorphToMany
    {
        return $this->morphedByMany(Place::class,'imageable');
    }

<<<<<<< HEAD

=======
   
>>>>>>> d67fe0a3c2469b5d59acf486414eb9fd2346953a
}
