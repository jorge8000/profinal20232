<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proyectos extends Model
{protected $fillable = [
    'NombreProyecto',
    'fuenteFondos',
    'MontoPlanificado',
    'MontoPatrocinado',
    'MontoFondosPropios',
];

protected static function boot()
{
    parent::boot();
    static::creating(function ($proyecto) {
        $proyecto->user_id = auth()->id();
    });
}

public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}
}
