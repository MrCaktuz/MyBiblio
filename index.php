<?php
require 'vendor/autoload.php';
include( 'routes.php' );
session_start();
$default_route = $routes['default'];
$route_parts = explode('/', $default_route);

$method = $_SERVER[ 'REQUEST_METHOD' ];
$a = isset( $_REQUEST[ 'a' ] ) ? $_REQUEST[ 'a' ] : 'home';
$r = isset( $_REQUEST[ 'r' ] ) ? $_REQUEST[ 'r' ] : 'pages';

if ( !in_array( $method.'_'.$a.'_'.$r, $routes ) ){
    die( 'We couldn\'t find the page you asked...' );
}

$controller_name = '\Controller\\'.ucfirst( $r ).'Controller';

// Pour ne plus devoir mettre de new dans les fichier pour créer un nouvel objet
$container = new \Illuminate\Container\container();
$controller = $container -> make( $controller_name );

$datas = call_user_func( [ $controller, $a ] ); // tout ce qu'on fait rentre la dedans. $controller c'est le nom de l'objet et $a c'est la méthode de cette objet.
// echo json_encode( $datas );

// charge la vue principale
include( 'views/layout.php' );
