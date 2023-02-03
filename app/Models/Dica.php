<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Dica.
 *
 * @package namespace App\Models;
 * @property int $id
 * @property string $titulo
 * @property string $categoria
 * @property string $texto
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Dica newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dica newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dica query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dica whereCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dica whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dica whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dica whereTexto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dica whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dica whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Dica extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo',
        'categoria',
        'texto',
    ];

}
