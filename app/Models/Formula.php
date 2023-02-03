<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Formula.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $name
 * @property string $aplic
 * @property string $descri
 * @property int $disciplina_id
 * @property int $foto_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Foto $foto
 * @method static \Illuminate\Database\Eloquent\Builder|Formula newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formula newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Formula query()
 * @method static \Illuminate\Database\Eloquent\Builder|Formula whereAplic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formula whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formula whereDescri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formula whereDisciplinaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formula whereFotoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formula whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formula whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Formula whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Formula extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'aplic',
        'descri',
        'disciplina_id',
        'foto_id'
    ];

    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }

}
