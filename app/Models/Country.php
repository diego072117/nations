<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    // Tabla a conectar
    protected $table = "countries";

    // Clave primaria
    protected $primaryKey = "country_id";

    // Omitir campos de auditoria
    public $timestamps = false;

    use HasFactory;

    // M to M Country - Language
    // Relationship
    public function languages() {
        // belongsToMany
        // Tabla Pibote
        // Foreing key of current model
        // Foreing key of related model
        return $this->belongsToMany(Language::class, 'country_languages', 'country_id', 'language_id')->withPivot('official');
    }

    // M:1 country - region
    // Relationship
    public function regions() {
        //Belongs To method: Parameters
        // 1. Related model
        // 2.. Foreing key of related model in current model
        return $this->belongsTo(Region::class, 'region_id');
    }
}
