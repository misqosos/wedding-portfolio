
<?php
    $routes = [];
    $base = '/';

    route($base, function () {
        header('Location: '.$base.'home');
    });
    
    route(''.$base.'home', function () {
        include("pages/home-page/home.php");
    });
    
    route(''.$base.'jessie', function () {
        include("pages/questionnaire-page/questionnaire.php");
    });
    
    route(''.$base.'woody', function () {
        include("pages/questionnaire-page/questionnaire.php");
    });
    
    //menu ->
    route(''.$base.'nas-pribeh', function () {
        include("pages/menu/our-story/our-story.php");
    });
    
    route(''.$base.'doprava', function () {
        include("pages/menu/logistics/logistics.php");
    });
    
    route(''.$base.'hry', function () {
        include("pages/menu/games/games.php");
    });
    
    route(''.$base.'fotky', function () {
        include("pages/menu/uploads/uploads.php");
    });
    // <-
    
    route('/404', function () {
        echo "Page not found";
    });
    
    function route(string $path, callable $callback) {
        global $routes;
        $routes[$path] = $callback;
    }
    
    run();
    
    function run() {
        global $routes;
        $uri = $_SERVER['REQUEST_URI'];
        $found = false;
        foreach ($routes as $path => $callback) {
            if ($path !== $uri) continue;
    
            $found = true;
            $callback();
        }
    
        if (!$found) {
            $notFoundCallback = $routes['/404'];
            $notFoundCallback();
        }
    }
?>