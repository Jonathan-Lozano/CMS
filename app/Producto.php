<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre', 'descripcion', 'categoria', 'precio', 'cantidad', 'img', 'disponible', 'oferta'];
    public $timestamps = true;
}
