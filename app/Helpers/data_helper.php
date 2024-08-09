<?php
if(!function_exists('getRouteName')){
    function getRouteName(){
        $router = service('router');
        $actions = $router->getMatchedRouteOptions();
        return isset($actions['as']) ? $actions['as'] : '';
    }
}

if(!function_exists('getPlanOptions')){
    function getPlanOptions($plan_id = null){
        $plansModel = new \App\Models\Plans;
        $plans = $plansModel->find();
        $html  = "";
        if(!empty($plans)){
            foreach($plans as $plan){
                if($plan['status'] == '1'){
                    ($plan_id == $plan['id'])? $select = 'selected': $select = '';
                    $html .= '<option value="'.$plan['id'].'"  '.$select.'>'.$plan['plan'].'-'.$plan['price'].'Rs </option>';
                }
            }
        }
        return $html;
    }
}