<?php

/**
 * The Admin page model
 */
class Admin
{

    private $message = 'Welcome to Home page.';

    function __construct()
    {

    }

    public function admin()
    {
        return 'admin';
    }

    public function addCocktail()
    {
        return 'add-cocktail';
    }

    public function comments()
    {
        return 'comments';
    }

    public function edit()
    {
        return 'edit';
    }

}