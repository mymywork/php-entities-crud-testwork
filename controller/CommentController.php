<?php

class CommentController extends BaseController  {

    function editAction() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $r = Comment::fetchById($id);

        return $this->view->render("EditComment", array( "comment" => $r ));
    }

    function saveAction() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $r = Comment::fetchById($id);

        $r->name = strip_tags($_REQUEST['name']);
        $r->body = strip_tags($_REQUEST['body']);
        $r->update();

        header("Location: /".$r->type."/show?id=".$r->assignId);
        die();
    }

    function deleteAction() {
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);
        $r = Comment::fetchById($id);

        $r->delete();

        header("Location: /".$r->type."/show?id=".$r->assignId);
        die();
    }

    function addAction() {
        $assignId = filter_var($_REQUEST['assignId'], FILTER_SANITIZE_NUMBER_INT);
        $type = filter_var($_REQUEST['type'], FILTER_SANITIZE_STRING);
        return $this->view->render("AddComment", array( "type" => $type, "assignId" => $assignId ));
    }

    function insertAction() {
        $type = filter_var($_REQUEST['type'], FILTER_SANITIZE_STRING);
        $assignId = filter_var($_REQUEST['assignId'], FILTER_SANITIZE_NUMBER_INT);

        if (!in_array($type, ["Article", "Book"])) {
            return "Unknow type";
        }

        $r = $type::fetchById($assignId);

        $r = new Comment();
        $r->assignId = $assignId;
        $r->type = $type;
        $r->name = strip_tags($_REQUEST['name']);
        $r->body = strip_tags($_REQUEST['body']);
        $r->insert();

        header("Location: /".$r->type."/show?id=".$r->assignId);
        die();
    }

}
