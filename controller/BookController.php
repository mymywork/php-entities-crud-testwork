<?php

class BookController  extends BaseController  {

    function showAction() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $r = Book::fetchById($id);

        $c = $r->getComments();

        return $this->view->render("ShowBook", array( "book" => $r, "comments" => $c));
    }

    function addAction() {
        return $this->view->render("AddBook", array( ));
    }

    function insertAction() {
        $r = new Book();
        $r->name = strip_tags($_REQUEST['name']);
        $r->body = strip_tags($_REQUEST['body']);
        $r->insert();

        header("Location: /book/show?id=".$r->id);
        die();
    }

    function editAction() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $r = Book::fetchById($id);

        return $this->view->render("EditBook", array( "book" => $r ));
    }

    function saveAction() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $r = Book::fetchById($id);

        $r->name = strip_tags($_REQUEST['name']);
        $r->body = strip_tags($_REQUEST['body']);
        $r->update();

        header("Location: /book/show?id=".$id);
        die();
    }

    function deleteAction() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $r = Book::fetchById($id);

        $r->delete();

        header("Location: /main/index");
        die();
    }


}
