<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Estado
 *
 * @property $id_estado
 * @property $estado
 * @property $created_at
 * @property $updated_at
 *
 * @property RegistrosLlamada[] $registrosLlamadas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Estado extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['id_estado', 'estado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registrosLlamadas()
    {
        return $this->hasMany(\App\Models\RegistrosLlamada::class, 'id_estado', 'id_estado');
    }
    
}
