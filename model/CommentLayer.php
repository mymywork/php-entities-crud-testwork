<?php

class CommentLayer extends Entity
{

    function getComments()
    {
        return Comment::fetchByEntity(get_class($this) ,$this->id);
    }

    function addComment($name,$body) {
        $c = new Comment();
        $c->name = $name;
        $c->body = $body;
        $c->type = get_class($this);
        $c->assignId = $this->id;
        $c->insert();
    }

    function delete() {
        Comment::deleteByEntity(get_class($this) ,$this->id);
        parent::delete();
    }

}

?>