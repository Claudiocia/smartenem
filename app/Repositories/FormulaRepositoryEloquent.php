<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\FormulaRepository;
use App\Models\Formula;
use App\Validators\FormulaValidator;

/**
 * Class FormulaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class FormulaRepositoryEloquent extends BaseRepository implements FormulaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Formula::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
