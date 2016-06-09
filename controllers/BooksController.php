<?php
namespace Controller;

use Model\Books;
use Model\Authors;
use Model\Editors;
use Model\Comments;

class BooksController extends Controller
{
    private $books_model = null;

    public function __construct()
    {
        $this -> books_model = new Books;
        $this -> comments_model = new Comments;
    }

    public function index()
    {
        $books = $this -> books_model -> all();
        $booksList = $this -> books_model -> getBooksOrderedByTitle();
        $view = 'views/' . $GLOBALS[ 'a' ] . $GLOBALS[ 'r' ] . '.php';

        return [
            'view' => $view,
            'page_title' => 'Books - Mucht books',
            'books' => $books,
            'booksList' => $booksList
        ];
    }

    public function show() {

        if ( !isset( $_GET[ 'id' ] ) ) {
            die( 'Il manque l\'identifiant de votre livre' );
        }
        $id = intval( $_GET[ 'id' ] ); // Je recup l'ID dans la barre d'adresse.
        $view = 'showBooks.php';
        $book = $this -> books_model -> find( $id );
        $booksList = $this -> books_model -> getBooksOrderedByTitle();
        $comments = $this -> comments_model -> getCommentsByBookID( $id );
        $authors = null;
        $editors = null;

        if ( isset( $_GET[ 'with' ] ) ) {
            $with = explode( ',', $_GET[ 'with' ] );
            if ( in_array( 'authors', $with ) ) {
                $authors_model = new Authors();
                $authors = $authors_model -> getAuthorsByBookID( $book -> id );
            }
            if ( in_array( 'editors', $with ) ) {
                $editors_model = new Editors();
                $editors = $editors_model -> getEditorsByBookID( $book -> id );
            }
        }

        return [
            'book' => $book,
            'booksList' => $booksList,
            'view' => $view,
            'page_title' => $book -> title . ' - Mucht books',
            'authors' => $authors,
            'editors' => $editors,
            'comments' => $comments
        ];
    }
}
