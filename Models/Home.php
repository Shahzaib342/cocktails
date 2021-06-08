<?php

/**
 * The home page model
 */
class Home
{

    private $message = 'Welcome to Home page.';

    function __construct()
    {

    }

    public function home()
    {
        return $this->message;
    }

}