<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Questao.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $enunciado
 * @property string|null $apoio
 * @property string|null $option_a
 * @property string|null $option_b
 * @property string|null $option_c
 * @property string|null $option_d
 * @property string|null $option_e
 * @property string $resp
 * @property string|null $coment
 * @property string $ano_aplic
 * @property string|null $valor
 * @property string $quest_ouro
 * @property int $disciplina_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Apoio[] $apoios
 * @property-read int|null $apoios_count
 * @property-read \App\Models\Disciplina $disciplina
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Foto[] $fotos
 * @property-read int|null $fotos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Questao newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Questao newQuery()
 * @method static \Illuminate\Database\Query\Builder|Questao onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Questao query()
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereAnoAplic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereApoio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereComent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereDisciplinaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereEnunciado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereOptionA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereOptionB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereOptionC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereOptionD($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereOptionE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereQuestOuro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereResp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Questao whereValor($value)
 * @method static \Illuminate\Database\Query\Builder|Questao withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Questao withoutTrashed()
 * @mixin \Eloquent
 */
class Questao extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'enunciado', 'apoio', 'option_a', 'option_b', 'option_c', 'option_d', 'option_e',
        'resp', 'coment', 'ano_aplic', 'valor', 'quest_ouro',  'disciplina_id'
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function fotos()
    {
        return $this->belongsToMany(Foto::class);
    }

    public function apoios()
    {
        return $this->belongsToMany(Apoio::class);
    }

}
