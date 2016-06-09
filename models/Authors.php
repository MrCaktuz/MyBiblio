<?php
namespace Model;


// Model\Authors
class Authors extends Model
{
    protected $table = 'authors';

    public function getLastFiveAuthors() {
        $sql = 'SELECT * FROM ' . $this -> table . ' ORDER BY created_at DESC LIMIT 5;';
        $stmnt = $this -> cn -> query( $sql );

        return $stmnt -> fetchAll();
    }

    public function getAuthorsByBookID( $id )
    {
        $sql = 'SELECT authors.*
                FROM authors
                JOIN author_book on authors.id = author_book.author_id
                JOIN books on author_book.book_id = books.id
                WHERE books.id = :id';

        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ ':id' => $id ] );

        return $stmnt -> fetchAll();
    }

    public function getAuthorsByEditorID( $id ) {
        $sql = 'SELECT DISTINCT authors.*
                FROM authors
                JOIN author_book on authors.id = author_id
                JOIN books on books.editor_id = book_id
                JOIN editors on books.editor_id = editors.id
                WHERE editors.id = :id';

        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ ':id' => $id ] );

        return $stmnt -> fetchAll();
    }

    public function getAuthorsOrderedByName() {
        $sql = 'SELECT * FROM ' . $this -> table . ' ORDER BY name';
        $stmnt = $this -> cn -> query( $sql );

        return $stmnt -> fetchAll();
    }

    public function getAuthorsOrderedByID() {
        $sql = 'SELECT * FROM ' . $this -> table . ' ORDER BY id DESC LIMIT 20';
        $stmnt = $this -> cn -> query( $sql );

        return $stmnt -> fetchAll();
    }

}
