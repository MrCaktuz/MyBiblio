<?php
namespace Model;

class User extends Model
{
    protected $table = 'users';

    public function check( $credentials ) {
        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
        $stmnt = $this -> cn -> prepare( $sql );
        $stmnt -> execute( [
            'email' => $credentials[ 'email' ],
            'password' => $credentials[ 'password' ]
        ] );

        return $stmnt -> fetch();
    }
}
