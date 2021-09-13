<?php
class ArticleController extends BaseController {

    function showAction() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $r = Article::fetchById($id);

        $c = $r->getComments();

        return $this->view->render("ShowArticle", array( "article" => $r, "comments" => $c));
    }

    function addAction() {
        return $this->view->render("AddArticle", array());
    }

    function insertAction() {
        $r = new Article();
        $r->name = strip_tags($_REQUEST['name']);
        $r->body = strip_tags($_REQUEST['body']);
        $r->insert();

        header("Location: /article/show?id=".$r->id);
        die();
    }


    function editAction() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $r = Article::fetchById($id);

        return $this->view->render("EditArticle", array( "article" => $r ));
    }

    function saveAction() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $r = Article::fetchById($id);

        $r->name = strip_tags($_REQUEST['name']);
        $r->body = strip_tags($_REQUEST['body']);
        $r->update();

        header("Location: /article/show?id=".$id);
        die();
    }

    function deleteAction() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $r = Article::fetchById($id);

        $r->delete();

        header("Location: /main/index");
        die();
    }

}
