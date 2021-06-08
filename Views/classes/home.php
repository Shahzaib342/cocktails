<?php

/**
 * The home page view
 */
class homeView
{

    private $model;

    private $controller;

    function __construct($controller, $model)
    {
        $this->controller = $controller;

        $this->model = $model;
    }

    public function index()
    {
        return $this->controller->home();
    }

    public function home()
    {
        return $this->controller->home();
    }

}