<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['excursion_id', 'price', 'name', 'description'];

    public function excursion() {
        return $this->belongsTo(Excursion::class);
    }
}
