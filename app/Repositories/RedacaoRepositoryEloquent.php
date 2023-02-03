<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RedacaoRepository;
use App\Models\Redacao;
use App\Validators\RedacaoValidator;

/**
 * Class RedacaoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RedacaoRepositoryEloquent extends BaseRepository implements RedacaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Redacao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
