<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Redacao.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $tema
 * @property string $ano
 * @property string $titulo
 * @property string $apresent
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Apoio[] $apoios
 * @property-read int|null $apoios_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Foto[] $fotos
 * @property-read int|null $fotos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Redacao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Redacao newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Redacao query()
 * @method static \Illuminate\Database\Eloquent\Builder|Redacao whereAno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redacao whereApresent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redacao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redacao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redacao whereTema($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redacao whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redacao whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Redacao extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tema',
        'ano',
        'titulo',
        'apresent'
    ];

    public function fotos()
    {
        return $this->belongsToMany(Foto::class);
    }

    public function apoios()
    {
        return $this->belongsToMany(Apoio::class);
    }

}
