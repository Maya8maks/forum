<?php
namespace App\Framework;

use \Exception;
use App\Framework\Auth\Auth;

class Routing
{

    private $routes = [];

    public static function init() {

        static $instance;
        if( $instance ) return $instance;

        try {
            $instance = new Routing;
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }

        return $instance;
    }

    private function __construct() {

        try {
            include __DIR__ . '/../routes.php';

            $this->routes = $_routes;

        }
        catch( Exception $e ) {
            echo $e->getMessage();
        }
    }

    public function getCurrRouteHandler()
    {
        $uriSections = explode('?', $_SERVER['REQUEST_URI'], 2);

        $route = ( $uriSections[0] != '/' ) ? rtrim($uriSections[0],'/') : '/';
         
        foreach ($this->routes as $routePattern => $val) {
         
            if( preg_match( '/^'.addcslashes($routePattern,'/').'$/', $route) ) {

                if( $this->checkPolicy( $val ) ) {
                    return $val['handler'];
                }

                return false;
            }

        }

        return false;
    }

     private function checkPolicy( $route ) {
        if( isset($route['policy']) ) {

            if( $route['policy'][0]== 'is_admin' ) {
                     /*if($_SESSION['user_role']== 0 ){*/
                     /*   print_r(Auth::getLoggedUser()[0]->getIs_admin());*/
                        
             if( (Auth::getLoggedUser()[0]->getIs_admin() != true)) {
                    return false;
                }
            }
            if( $route['policy'] == 'is_user' ) {
                if( !Auth::getLoggedUser() ) {
                    return false;
                }
            }
        }
        return true;
    }
    public static function getRouteArgs()
    {
        $uriSections = explode('?', $_SERVER['REQUEST_URI'], 2);
        return array_filter(explode( '/', $uriSections[0] ));
    }
}