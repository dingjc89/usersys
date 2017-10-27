<?php

namespace App\Http\Middleware\Admin;

use Closure;

class FilterView
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
        if ($request->isMethod('get') && !$request->ajax()) {
            return response()->view('admin.layout.base',['url'=>$request->getRequestUri(),'ajaxload'=>true]);
        }
        return $next($request);
    }
}
