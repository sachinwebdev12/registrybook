<?php
if(!function_exists('getRouteName')){
    function getRouteName(){
        $router = service('router');
        $actions = $router->getMatchedRouteOptions();
        return isset($actions['as']) ? $actions['as'] : '';
    }
}