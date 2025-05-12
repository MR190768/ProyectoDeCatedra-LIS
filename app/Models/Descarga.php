<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Descarga extends Model
{
    use HasFactory;

    public $timestamps = false;


    protected $fillable = [

        'user_id',
        'contrato_id',
        'fecha_de_descarga',
    ];

    protected $dates = ['fecha_de_descarga'];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Contrato
    public function contrato()
    {
        return $this->belongsTo(Contrato::class);
    }
}
