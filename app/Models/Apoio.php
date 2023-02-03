<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Apoio.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $titulo
 * @property string|null $subtitulo
 * @property string $texto
 * @property string|null $assinatura
 * @property string|null $fonte
 * @property string|null $referencia
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Foto[] $fotos
 * @property-read int|null $fotos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Questao[] $questaos
 * @property-read int|null $questaos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Redacao[] $redacaos
 * @property-read int|null $redacaos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio query()
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio whereAssinatura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio whereFonte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio whereReferencia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio whereSubtitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio whereTexto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apoio whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Apoio extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'subtitulo',
        'texto',
        'assinatura',
        'fonte',
        'referencia'
    ];

    public function questaos()
    {
        return $this->hasMany(Questao::class);
    }

    public function fotos()
    {
        return $this->belongsToMany(Foto::class);
    }

    public function redacaos()
    {
        return $this->belongsToMany(Redacao::class);
    }

}
