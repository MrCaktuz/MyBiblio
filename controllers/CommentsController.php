<?php
namespace Controller;

use Model\Comments;

class CommentsController extends Controller
{
    private $comments_model = null;

    public function __construct() {

        $this -> comments_model = new Comments;

    }

    public function postComment() {
        $errors = [];
        $view = header( 'Location: ?a=show&r=books&id=' . $_POST[ 'id' ] . '&with=authors,editors' );;

        if ( empty( $_POST[ 'author' ] ) ) {
            $errors[ 'author' ] = 'Enter your name please';
        }

        if ( empty( $_POST[ 'comment' ] ) ) {
            $errors[ 'comment' ] = 'Whrite a comment please';
        }

        if ( count( $errors ) ) {
            $_SESSION[ 'errors' ] = $errors;
            $_SESSION[ 'old_datas' ] = $_POST;
            header( 'Location: ?a=show&r=books&id=' . $_POST[ 'id' ] . '&with=authors,editors' );
            return;
        }

        if ( $this -> comments_model -> save( [
                'author' => $_POST[ 'author' ],
                'comment' => $_POST[ 'comment' ],
                'book_id' => $_POST[ 'id' ]
                ] ) ) {

            return [
                'view' => $view,
            ];

        } else {
            $_SESSION[ 'errors' ] = [ 'error' => 'Impossible d\'enregistrer vos informations dans la base de données' ];
            $_SESSION[ 'old_datas' ] = $_POST;
            header( 'Location: index.php?a=getLogin&r=user' );
        }
    }

}
