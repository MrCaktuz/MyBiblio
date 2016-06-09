<?php
namespace Model;


// Model\Comments
class Comments extends Model
{
    protected $table = 'comments';

    public function getCommentsByBookID( $id ) {
        $sql = 'SELECT * FROM ' . $this -> table . ' where book_id = :id ORDER BY created_at DESC';

        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [ ':id' => $id ] );

        return $stmnt -> fetchAll();
    }
}
