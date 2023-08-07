<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use App\Repositories\Genre\{GenreInterface,GenreRepository};
use App\Repositories\User\{UserInterface,UserRepository};
use App\Repositories\Book\{BookInterface,BookRepository};
use App\Repositories\Chap\{ChapInterface,ChapRepository};
use App\Repositories\Role\{RoleInterface,RoleRepository};
use App\Repositories\Gallery\{GalleryInterface,GalleryRepository};
use App\Repositories\Accent\{AccentInterface,AccentRepository};
use App\Repositories\Author\{AuthorInterface,AuthorRepository};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GenreInterface::class,GenreRepository::class);
        $this->app->singleton(UserInterface::class,UserRepository::class);
        $this->app->singleton(ChapInterface::class,ChapRepository::class);
        $this->app->singleton(BookInterface::class,BookRepository::class);
        $this->app->singleton(RoleInterface::class,RoleRepository::class);
        $this->app->singleton(GalleryInterface::class,GalleryRepository::class);
        $this->app->singleton(AccentInterface::class,AccentRepository::class);
        $this->app->singleton(AuthorInterface::class,AuthorRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        // create blade directive
        Blade::directive('role',function($role){
            return "<?php if(auth()->check() && auth()->user()->hasRole({$role})) { ?>";
        });

        Blade::directive('endrole',function($role){
            return "<?php } ?>";
        });
    }
}
