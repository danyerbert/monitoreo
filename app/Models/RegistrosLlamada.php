<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RegistrosLlamada
 *
 * @property $id_registro_llamadas
 * @property $id_persona
 * @property $id_estado
 * @property $fecha_contacto
 * @property $hora_contacto
 * @property $numero_llamada
 * @property $atendio_llamada
 * @property $observaciones
 * @property $created_at
 * @property $updated_at
 *
 * @property Estado $estado
 * @property Persona $persona
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class RegistrosLlamada extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_registro_llamadas', 'id_persona', 'id_estado', 'fecha_contacto', 'hora_contacto', 'atendio_llamada', 'observaciones'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado()
    {
        return $this->belongsTo(\App\Models\Estado::class, 'id_estado', 'id_estado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persona()
    {
        return $this->belongsTo(\App\Models\Persona::class, 'id_persona', 'id_persona');
    }
    
}
