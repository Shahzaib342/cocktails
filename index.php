<?php

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : '/';

if ($url == '/') {

    // This is the home page
    // Initiate the home controller
    // and render the home view

    require_once __DIR__ . '/Models/Home.php';
    require_once __DIR__ . '/Controllers/HomeController.php';
    require_once __DIR__ . '/Views/classes/home.php';

    $indexModel = new Home();
    $indexController = new HomeController($indexModel);
    $indexView = new homeView($indexController, $indexModel);

    //fetch the data passed from model
    $data = $indexView->index();

    //render the view
    require_once __DIR__ . '/Views/home.php';

} else {

    // This is not home page
    // Initiate the appropriate controller
    // and render the required view

    //The first element should be a controller
    $requestedController = $url[0];

    // If a second part is added in the URI,
    // it should be a method
    $requestedAction = isset($url[1]) ? $url[1] : '';

    // The remain parts are considered as
    // arguments of the method
    $requestedParams = array_slice($url, 2);

    // Check if controller exists. NB:
    // You have to do that for the model and the view too
    $ctrlPath = __DIR__ . '/Controllers/' . ucwords($requestedController) . 'Controller.php';

    if (file_exists($ctrlPath)) {

        require_once __DIR__ . '/Models/' . ucwords($requestedController) . '.php';
        require_once __DIR__ . '/Controllers/' . ucwords($requestedController) . 'Controller.php';
        require_once __DIR__ . '/Views/classes/' . $requestedController . '.php';

        $modelName = ucfirst($requestedController);
        $controllerName = ucfirst($requestedController) . 'Controller';
        $viewName = ucfirst($requestedController) . 'View';

        $controllerObj = new $controllerName(new $modelName);
        $viewObj = new $viewName($controllerObj, new $modelName);

        //fetch the data passed from model
        $view = $requestedAction == "" ? $requestedController : $requestedAction;
        $data = $viewObj->$view();
;
        //render the view
        require_once __DIR__ . '/Views/'. $data . '.php';


        // If there is a method - Second parameter
        if ($requestedAction != '') {
            // then we call the method via the view
            // dynamic call of the view
            print $viewObj->$requestedAction($requestedParams);

        }

    } else {

        header('HTTP/1.1 404 Not Found');
        die('404 - The file - ' . $ctrlPath . ' - not found');
        //require the 404 controller and initiate it
        //Display its view
    }
}