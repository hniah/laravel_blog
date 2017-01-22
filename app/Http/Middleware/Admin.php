<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $this->renderMenu();

        if(!Auth::check() or $request->user()->admin!=1) {
            return redirect('/')->with('message', 'I am so frustrated.');
        }
        return $next($request);
    }

    private function renderMenu(){
        \Menu::make('AdminNav', function($menu){
            $menu->add('Home', route('dashboard'));
            $menu->add('Languages',  route('languages.index'));
        });
    }
}
