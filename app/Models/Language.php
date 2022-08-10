<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    // Tabla a conectar
    protected $table = "languages";

    // Clave primaria
    protected $primaryKey = "language_id";

    // Omitir campos de auditoria
    public $timestamps = false;

    use HasFactory;

    // M : M language Country
    // Relationship

    public function paises() {
        return $this->belongsToMany(Country::class, 'country_languages' , 'language_id' , 'country_id')->withPivot('official');
    }
}
