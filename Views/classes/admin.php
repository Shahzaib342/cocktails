<?php

/**
 * The admin page view
 */
class adminView
{

    private $model;

    private $controller;

    function __construct($controller, $model)
    {
        $this->controller = $controller;

        $this->model = $model;
    }

    public function admin()
    {
        return $this->controller->admin();
    }

    public function addCocktail()
    {
        return $this->controller->addCocktail();
    }

    public function comments()
    {
        return $this->controller->comments();
    }

    public function edit()
    {
        return $this->controller->edit();
    }

}