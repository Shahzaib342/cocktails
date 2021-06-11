<?php

/**
 * The home page controller
 */
class HomeController
{
    private $model;

    function __construct($model)
    {
        $this->model = $model;
    }

    public function home()
    {
        return $this->model->home();
    }

    public function cocktailDetails()
    {
        return $this->model->cocktailDetails();
    }

}