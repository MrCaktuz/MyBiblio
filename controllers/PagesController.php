<?php
namespace Controller;

use Model\Books;
use Model\Authors;

class PagesController extends Controller
{
    public function __construct()
    {
        $this -> books_model = new Books;
        $this -> authors_model = new Authors;
    }

    public function home(){

        $lastBooks = $this -> books_model -> getLastFiveBooks();
        $lastAuthors = $this -> authors_model -> getLastFiveAuthors();

        return[
            'view' => 'home.php',
            'page_title' => 'Home - Mucht books',
            'lastBooks' => $lastBooks,
            'lastAuthors' => $lastAuthors
        ];
    }

    public function admin(){

        $lastBooks = $this -> books_model -> getLastFiveBooks();
        $lastAuthors = $this -> authors_model -> getLastFiveAuthors();

        if ( !isset( $_SESSION[ 'user' ] ) ) {
            header( 'Location: ?a=getLogin&r=user' ); // il faut un session_start! voir index...
        }

        return [
            'view' => 'admin.php',
            'page_title' => 'Home - Mucht books',
            'lastBooks' => $lastBooks,
            'lastAuthors' => $lastAuthors
        ];
    }
}
