<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ApoioRepository;
use App\Models\Apoio;
use App\Validators\ApoioValidator;

/**
 * Class ApoioRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ApoioRepositoryEloquent extends BaseRepository implements ApoioRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Apoio::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
