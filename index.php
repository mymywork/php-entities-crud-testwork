<?php

    require_once "./model/Entity.php";
    require_once "./model/CommentLayer.php";
    require_once "./model/Book.php";
    require_once "./model/Article.php";
    require_once "./model/Comment.php";
    require_once "./core/Db.php";
    require_once "./core/View.php";

    require_once "./core/BaseController.php";
    require_once "./controller/MainController.php";
    require_once "./controller/ArticleController.php";
    require_once "./controller/BookController.php";
    require_once "./controller/CommentController.php";

    Db::init();

    Book::createTable();
    Article::createTable();
    Comment::createTable();

    $controllerName = "MainController";
    $actionName = "indexAction";

    if ( $_SERVER['REQUEST_URI'] != "/" ) {
        $urlstr = explode('?', $_SERVER['REQUEST_URI']);

        $urlParams = explode('/', $urlstr[0]);
        if ( count($urlParams) >= 2 && $urlParams[1] != null ) $controllerName = ucfirst($urlParams[1]).'Controller';
        if ( count($urlParams) == 3 && $urlParams[2] != null ) $actionName = lcfirst($urlParams[2]).'Action';
        if ( count($urlParams) > 3 ) { echo "Fail controller/action format."; exit(); }
    }

    $v = new View();
    $controller = new $controllerName($v);
    try {
        echo $controller->$actionName();
    } catch (Exception $e) {
        echo "<h3>Exception:</h3> ".$e->getMessage();
        //var_dump($e->getMessage());
    }
?>