<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public $timestamps = false;


     protected $fillable = [
        'titulo',
        'descripcion',
    ];

    public function contratos()
    {
        return $this->hasMany(Contrato::class);
    }
}
