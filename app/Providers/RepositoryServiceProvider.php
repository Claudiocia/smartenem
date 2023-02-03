<?php

namespace App\Providers;

use App\Repositories\ApoioRepository;
use App\Repositories\ApoioRepositoryEloquent;
use App\Repositories\AreaRepository;
use App\Repositories\AreaRepositoryEloquent;
use App\Repositories\AssuntoRepository;
use App\Repositories\AssuntoRepositoryEloquent;
use App\Repositories\DicaRepository;
use App\Repositories\DicaRepositoryEloquent;
use App\Repositories\DisciplinaRepository;
use App\Repositories\DisciplinaRepositoryEloquent;
use App\Repositories\EventoRepository;
use App\Repositories\EventoRepositoryEloquent;
use App\Repositories\FormulaRepository;
use App\Repositories\FormulaRepositoryEloquent;
use App\Repositories\FotoRepository;
use App\Repositories\FotoRepositoryEloquent;
use App\Repositories\NoticiaRepository;
use App\Repositories\NoticiaRepositoryEloquent;
use App\Repositories\QuestaoRepository;
use App\Repositories\QuestaoRepositoryEloquent;
use App\Repositories\RedacaoRepository;
use App\Repositories\RedacaoRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FotoRepository::class, FotoRepositoryEloquent::class);
        $this->app->bind(AreaRepository::class, AreaRepositoryEloquent::class);
        $this->app->bind(DisciplinaRepository::class, DisciplinaRepositoryEloquent::class);
        $this->app->bind(QuestaoRepository::class, QuestaoRepositoryEloquent::class);
        $this->app->bind(FormulaRepository::class, FormulaRepositoryEloquent::class);
        $this->app->bind(RedacaoRepository::class, RedacaoRepositoryEloquent::class);
        $this->app->bind(ApoioRepository::class, ApoioRepositoryEloquent::class);
        $this->app->bind(EventoRepository::class, EventoRepositoryEloquent::class);
        $this->app->bind(DicaRepository::class, DicaRepositoryEloquent::class);
        $this->app->bind(NoticiaRepository::class, NoticiaRepositoryEloquent::class);
        $this->app->bind(AssuntoRepository::class, AssuntoRepositoryEloquent::class);
        //:end-bindings:
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
