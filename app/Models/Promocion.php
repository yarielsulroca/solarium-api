<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Negocio;

class Promocion extends Model
{
    use HasFactory;
    protected $table = 'promociones';
    protected $fillable = [
        'descripcion',
        'imagen',
        'titulo',
        'status',
        'negocio_id'
        ];
        /* relacion mucho a muchos entre usuarios y servicios */
    /**
     * relacion de 1 a muchos entre negocio y Promociones ( un negocio tiene muchas proomociones )
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function negocio()
    {
        return $this->belongsTo(Negocio::class,'negocio_id');
    }

}
