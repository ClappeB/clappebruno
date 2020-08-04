<?php

namespace App\Http\Middleware\General;

use App\Http\Helpers\VisitorHelper;
use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class FirstVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!VisitorHelper::isOldVisitor()){
           VisitorHelper::makeOldVisitor();
        }
        return $next($request);
    }

}
