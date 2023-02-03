<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Evento.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $titulo
 * @property string $resumo
 * @property string|null $texto
 * @property string|null $data_ini
 * @property string|null $data_fim
 * @property string|null $hora_ini
 * @property string|null $hora_fim
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Evento newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evento newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Evento query()
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereDataFim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereDataIni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereHoraFim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereHoraIni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereResumo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereTexto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Evento whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Evento extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'resumo',
        'texto',
        'data_ini',
        'data_fim',
        'hora_ini',
        'hora_fim',
        'status'
    ];

}
