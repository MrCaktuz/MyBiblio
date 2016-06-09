<?php
// analyser ce que l'utilisateur veux vraiment.
namespace Controller;

use Model\Authors;
use Model\Books;
use Model\Editors;

class AuthorsController
{
    private $authors_model = null;

    public function __construct()
    {
        $this -> authors_model = new Authors();
        $this -> books_model = new Books();
        $this -> editors_model = new Editors();
    }

    public function index() {

        $authors = $this -> authors_model -> getAuthorsOrderedByID();
        $authorsList = $this -> authors_model -> getAuthorsOrderedByName();
        $view = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'r' ] . '.php';

        return [
            'page_title' => 'Authors - Mucht books',
            'authors' => $authors, 'view' => $view,
            'authorsList' => $authorsList
        ];
    }

    public function show() {

        if ( !isset( $_GET[ 'id' ] ) ) {
            die( 'Il manque l\'identifiant de votre livre' );
        }
        $id = intval( $_GET[ 'id' ] ); // Je recup l'ID dans la barre d'adresse.
        $view = 'showAuthors.php';
        $author = $this -> authors_model -> find( $id );
        $authorsList = $this -> authors_model -> getAuthorsOrderedByName();
        $books = null;
        $editors = null;

        if ( isset( $_GET[ 'with' ] ) ) {
            $with = explode( ',', $_GET[ 'with' ] );
            if ( in_array( 'books', $with ) ) {
                $books_model = new Books();
                $books = $books_model -> getBooksByAuthorID( $author -> id );
            }
            if ( in_array( 'editors', $with ) ) {
                $editors_model = new Editors();
                $editors = $editors_model -> getEditorsByAuthorID( $author -> id );
            }
        }

        return [
            'author' => $author,
            'authorsList' => $authorsList,
            'view' => $view,
            'page_title' => $author -> name . ' - Mucht books',
            'books' => $books,
            'editors' => $editors
        ];
    }
}
