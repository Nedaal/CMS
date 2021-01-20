<?php

namespace App\Http\Middleware;
use App\Category;
use Closure;

class verifyCategorycount
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

       if(Category::all()->count()=== 0){
          session()->flash('error','You need to add categories in order to be able to add post');
             return redirect()->back();

       }


        return $next($request);
    }
}
