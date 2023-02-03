<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Disciplina.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $name
 * @property string|null $enunciado
 * @property int $area_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Area $area
 * @method static \Illuminate\Database\Eloquent\Builder|Disciplina newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disciplina newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Disciplina query()
 * @method static \Illuminate\Database\Eloquent\Builder|Disciplina whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disciplina whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disciplina whereEnunciado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disciplina whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disciplina whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Disciplina whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Disciplina extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'enunciado', 'area_id'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function assuntos()
    {
        return $this->hasMany(Assunto::class);
    }

}
