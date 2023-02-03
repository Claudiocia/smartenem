<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Foto.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $name_orig
 * @property string $name
 * @property string $path
 * @property string $aplic
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Apoio[] $apoios
 * @property-read int|null $apoios_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Questao[] $questaos
 * @property-read int|null $questaos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Redacao[] $redacaos
 * @property-read int|null $redacaos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Foto newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto query()
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereAplic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereNameOrig($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $credito
 * @property string|null $legenda
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereCredito($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Foto whereLegenda($value)
 */
class Foto extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_orig', 'name', 'path', 'aplic', 'credito', 'legenda',
    ];

    public function redacaos()
    {
        return $this->hasMany(Redacao::class);
    }

    public function questaos()
    {
        return $this->hasMany(Questao::class);
    }

    public function apoios()
    {
        return $this->hasMany(Apoio::class);
    }

}
