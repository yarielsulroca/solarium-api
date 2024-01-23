<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $table = 'emails'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'subject',
        'content'
    ];

}
