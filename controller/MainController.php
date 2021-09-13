<?php

class MainController extends BaseController {

    function indexAction() {
        $articles = Article::fetchAll();
        $books = Book::fetchAll();
        return $this->view->render("Main", array( "articles" => $articles, "books" => $books));
    }

}