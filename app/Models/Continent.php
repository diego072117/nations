<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    // Tabla a conectar
    protected $table = "continents";

    // Clave primaria
    protected $primaryKey = "continent_id";

    // Omitir campos de auditoria
    public $timestamps = false;

    use HasFactory;

    // Relacion entre continente y regiones
    public function regiones() {
        // Linked model
        return $this->hasMany(Region::class,
                                'continent_id');
    } 


    //relacion entre continentes y paises
    //1 Continent: Abuelo
    // Region: papa

    public function paises(){
        //1 nieto
        //2 papa 
        //3 FK del abuelo en en papa
        //4 FK del papa en el nieto

        return $this->hasManyThrough(Country::class, 
                                    Region:: class,
                                    'continent_id', 'region_id');
    }


}
