<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    // Tabla a conectar
    protected $table = "regions";

    // Clave primaria
    protected $primaryKey = "region_id";
    
    // Omitir campos de auditoria
    public $timestamps = false;

    use HasFactory;

    // 1 ... M Region - Country
    // Relationship
    public function countries() {

        return $this->hasMany(Country::class , 'region_id');

    })
}
