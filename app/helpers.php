<?php

if (! function_exists('routeRelaxed')) {
    function routeRelaxed($routeName)
    {
        $routes = Route::getRoutes();
        
        $route = $routes->getByName($routeName);

        if (! isset($route)) {
            abort(404, "The named route '" . $routeName . "' doesn't exist.");
            
            return false;
        }

        $appUrl = config('app.url') . '/';

        $regexPattern = '/(^[^\{]+)/m';

        $result = preg_match($regexPattern, $route->uri, $matches);
        
        if (empty($matches)) {
            return $appUrl . $route->uri;
        }

        $routeWithoutParameters = $matches[1];

        return $appUrl . $routeWithoutParameters;
    }
}
