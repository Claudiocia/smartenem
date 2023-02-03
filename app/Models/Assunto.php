<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Assunto.
 *
 * @package namespace App\Models;
 */
class Assunto extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'resumo', 'explic', 'disciplina_id'
    ];

    public function disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

}
