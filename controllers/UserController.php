<?php

namespace Controller;

use Model\User;

class UserController extends Controller
{
    private $user_model = null;

    public function __construct() {

        $this -> user_model = new User;

    }

    public function getLogin() {

        return ['view' => 'login.php', 'page_title' => 'Login - Mucht books'];

    }

    public function getRegister() {

        return [ 'view' => 'register.php', 'page_title' => 'Register - Mucht books' ];
    }

    public function postRegister() {
        $errors=[];

        if ( empty( $_POST[ 'email' ] ) ) {
            $errors[ 'email' ] = 'Veuillez entrer un email';
        } elseif ( strpos( $_POST[ 'email' ], '@', 1 ) === false ) {
            $errors[ 'email' ] = 'Veuillez entrer un email correcte';
        }

        if ( empty( $_POST[ 'password' ] ) ) {
            $errors[ 'password' ] = 'Veuillez entrer un password';
        } elseif ( strlen( $_POST[ 'password' ] ) < 6 ) {
            $errors[ 'password' ] = 'Il faut que votre mot de passe soir de au moins 6 lettres';
        }

        if ( empty( $_POST[ 'username' ] ) ) {
            $errors[ 'username' ] = 'Veuillez entrer un username';
        }

        if ( count( $errors ) ) {
            $_SESSION[ 'errors' ] = $errors;
            $_SESSION[ 'old_datas' ] = $_POST;
            header( 'Location: index.php?a=getRegister&r=user' );
            return;
        }
        // Il faut ajouter les gestions d'erreur.
        if ($this -> user_model -> save([
            'password' => sha1( $_POST[ 'password' ] ),
            'email' => $_POST[ 'email' ],
            'name' => $_POST[ 'username' ]
        ] )
        ) {
            return [ 'view' => 'login.php', 'page_title' => 'Login - Mucht books' ];
        } else {
            $_SESSION[ 'errors' ] = [ 'error' => 'Impossible d\'enregistrer vos informations dans la base de données' ];
            $_SESSION[ 'old_datas' ] = $_POST;
            header( 'Location: index.php?a=getRegister&r=user' );
        }


    }

    public function postLogin() {

        if( $user = $this -> user_model -> check( [
            'email' => $_POST[ 'email' ],
            'password' => sha1( $_POST[ 'password' ] )
            ] )
        ) {
            $_SESSION[ 'user' ] = json_encode( $user ); // on mémorise le user dans la session
            header( 'Location: ?a=admin&r=pages' ); // on décide de la page qu'il voir quand il s'est bien
        } else {

        }

    }

    public function getLogout() {
        if ( isset( $_SESSION[ 'user' ] ) ) {
            unset( $_SESSION[ 'user' ] );
            session_destroy();
            setcookie( session_name(), '', time()-100 );
        }
        header( 'Location: index.php' );
    }

}
