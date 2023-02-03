<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\DicaRepository;
use App\Models\Dica;
use App\Validators\DicaValidator;

/**
 * Class DicaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DicaRepositoryEloquent extends BaseRepository implements DicaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Dica::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
