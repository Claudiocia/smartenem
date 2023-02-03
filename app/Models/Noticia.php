<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Noticia.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $titulo
 * @property string|null $fonte
 * @property string $resumo
 * @property string $texto
 * @property string $data
 * @property string $public
 * @property int|null $foto_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Foto|null $foto
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereFonte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereFotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia wherePublic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereResumo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereTexto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Noticia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Noticia extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'fonte',
        'resumo',
        'texto',
        'public',
        'data',
        'foto_id'
    ];

    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }

}
