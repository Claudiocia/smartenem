<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\QuestaoRepository;
use App\Models\Questao;
use App\Validators\QuestaoValidator;

/**
 * Class QuestaoRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class QuestaoRepositoryEloquent extends BaseRepository implements QuestaoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Questao::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
