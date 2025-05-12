<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $filliable = [
        'titulo',
        'descripcion',
        'categoria_id',
        'file_path'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function descargas()
    {
        return $this->hasMany(Descarga::class);
    }
}
