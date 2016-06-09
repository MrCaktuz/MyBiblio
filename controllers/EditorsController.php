<?php
namespace Controller;

use Model\Editors;
use Model\Books;
use Model\Authors;

class EditorsController
{
    private $editors_model = null;

    public function __construct()
    {
        $this -> editors_model = new Editors();
        $this -> books_model = new Books();
        $this -> authors_model = new Authors();
    }

    public function index()
    {
        $editors = $this -> editors_model -> getEditorsOrderedByID();
        $editorsList = $this -> editors_model -> getEditorsOrderedByName();
        $view = 'indexEditors.php';

        return [
            'page_title' => 'Editors - Mucht books',
            'editors' => $editors,
            'view' => $view,
            'editorsList' => $editorsList
        ];
    }

    public function show( ) {
        if ( !isset( $_GET[ 'id' ] ) ) {
            die( 'Il manque l\'identifiant de votre livre' );
        }
        $id = intval( $_GET[ 'id' ] );
        $view = 'showEditors.php';
        $editor = $this -> editors_model -> find( $id );
        $editorsList = $this -> editors_model -> getEditorsOrderedByName();
        $books = null;
        $authors = null;

        if ( isset($_GET[ 'with' ] ) ) {
            $with = explode( ',', $_GET[ 'with' ] );
            if ( in_array( 'books', $with ) ) {
                $books_model = new Books();
                $books = $books_model -> getBooksByEditorID( $editor -> id );
            }
            if ( in_array( 'authors', $with ) ) {
                $authors_model = new Authors();
                $authors = $authors_model -> getAuthorsByEditorID( $editor -> id );
            }
        }
        return [
            'editor' => $editor,
            'editorsList' => $editorsList,
            'view' => $view,
            'page_title' => $editor -> name . ' - Mucht books',
            'books' => $books,
            'authors' => $authors
        ];
    }
}
