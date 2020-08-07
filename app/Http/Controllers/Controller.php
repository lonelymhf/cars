<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Gate;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $route = Route::current();
        $action = collect($route->getAction());
        $uses = $action->get('uses');
        if($uses) {
            $uses = explode("@", Str::afterLast($uses, DIRECTORY_SEPARATOR));
            $contrller = $uses[0];
            $method = Str::snake($uses[1]);
            $contrller = Str::singular( Str::snake(Str::replaceLast("Controller", '', $contrller)) );
            if($contrller && $method) {
                $method = $method == 'index' ? 'access' : $method;
                $method = $method == 'store' ? 'create' : $method;
                $method = $method == 'update' ? 'edit' : $method;
                $method = $method == 'destroy' ? 'delete' : $method;
                $method = $method == 'massDestroy' ? 'delete' : $method;
                $can = "can:{$contrller}_{$method}";
                $this->middleware($can)->only($uses[1]);
            }
        }
    }
}
