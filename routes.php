<?php

$routes = [
    'default' => 'GET_home_pages',
    'books' => 'GET_index_books',
    'authors' => 'GET_index_authors',
    'editors' => 'GET_index_editors',
    'book' => 'GET_show_books',
    'author' => 'GET_show_authors',
    'editor' => 'GET_show_editors',
    'post_comments' => 'POST_postComment_comments',
    'protected_page' => 'GET_admin_pages',
    'get_register' => 'GET_getRegister_user',
    'post_register' => 'POST_postRegister_user', // tu as soumis la demande d'enregistrer un user
    'get_login' => 'GET_getLogin_user',
    'post_login' => 'POST_postLogin_user',
    'get_logout' => 'GET_getLogout_user'
];
