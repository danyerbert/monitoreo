<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Persona
 *
 * @property $id_persona
 * @property $nombre_completo
 * @property $created_at
 * @property $updated_at
 *
 * @property RegistrosLlamada[] $registrosLlamadas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Persona extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_persona', 'nombre_completo'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrosLlamadas()
    {
        return $this->hasMany(\App\Models\RegistrosLlamada::class, 'id_persona', 'id_persona');
    }
    
}
