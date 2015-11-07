<?php
/**
 * Class RWLiteKit_Route_Prefix_RW
 */
class RWLiteKit_Route_Prefix_RW implements XenForo_Route_Interface {

    public function match($routePath, Zend_Controller_Request_Http $request, XenForo_Router $router) {
        // Благодарю Jaxel за его документацию (http://xenforo.com/community/threads/13605/)
        $components = explode('/', $routePath);
        $subPrefix = strtolower(array_shift($components));
        $subSplits = explode('.', $subPrefix);
        $slice = false;
        switch ($subPrefix) {
            case 'one':
                $controller = "One";
                break;
            case 'two':
                $controller = "Two";
                break;
            case 'three':
                $controller = "Three";
                break;
            case 'rw':
            default:
                $controller = 'RW';
        }
        $routePathAction = ($slice ? implode('/', array_slice($components, 0, 2)) : $routePath).'/';
        $routePathAction = str_replace('//', '/', $routePathAction);
        $action = $router->resolveActionWithStringParam($routePathAction, $request, "string_id");
        return $router->getRouteMatch('RWLiteKit_ControllerPublic_' . $controller, $action, 'view');
    }
}
