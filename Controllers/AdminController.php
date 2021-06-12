<?php

/**
 * The Admin page controller
 */
class AdminController
{
    private $model;

    function __construct($model)
    {
        $this->model = $model;
    }

    public function admin()
    {
        return $this->model->admin();
    }

    public function addCocktail()
    {
        return $this->model->addCocktail();
    }

    public function comments()
    {
        return $this->model->comments();
    }

}