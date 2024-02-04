<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserRole
{
    public function handle($request, Closure $next)
    {
        // Assuming you have a 'role' field in your User model
        if (auth()->check() && (auth()->user()->role == 1)) {
            return $next($request);
        }
        
        // Get the requested route name
        $currentRouteName = $request->route()->getName();

        // Map route names to corresponding views
        $routeToViewMap = [
            'products.index' => 'catalogo',
            'categories.index' => 'categorias',
            'user.index' => 'usuarios',
            // Add more mappings as needed
        ];

        // Check if the requested route is mapped, otherwise use a default view
        $redirectView = $routeToViewMap[$currentRouteName] ?? 'client';
        //dump($redirectView, $routeToViewMap, $currentRouteName);
        return redirect()->route($redirectView);
    }
}
