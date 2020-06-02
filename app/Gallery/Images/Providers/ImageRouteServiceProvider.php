<?php

namespace Gallery\Images\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class ImageRouteServiceProvider extends RouteServiceProvider
{
    protected $namespace = 'Gallery\Images\Http\Controllers';

    public function map()
    {
        $this->mapApiRoutes();
    }

    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('app/Gallery/Images/routes/api.php'));
    }

}
