<?php

class Comment extends Entity {

    const TABLE = 'Comments';

    public $name;
    public $body;

    static function createTable() {
        Db::$db->exec("CREATE TABLE ".static::TABLE." (id INTEGER PRIMARY KEY , name TEXT, body TEXT, type TEXT, assignId INTEGER) ");
    }

    static function fetchByEntity($type, $assignId) {
        $sql = "SELECT * from ".static::TABLE." where type=? and assignId=?";
        //print($sql);
        $st = Db::$db->prepare($sql);
        $st->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        //print(get_called_class());
        $st->execute(array($type,$assignId));
        $list = $st->fetchAll();
        return $list;
    }

    function insert() {
        $str = "INSERT INTO ".static::TABLE."(name,body,type,assignId) VALUES (?,?,?,?)";
        $st = Db::$db->prepare($str);
        $r = $st->execute(array($this->name,$this->body,$this->type,$this->assignId));
        $this->id = Db::$db->lastInsertId();
        //print_r($this->id);
    }

    static function deleteByEntity($type,$assignId) {
        $sql = "DELETE FROM ".static::TABLE." WHERE type=? and assignId=?";
        $st = Db::$db->prepare($sql);
        $r = $st->execute(array($type,$assignId));
    }

    function update() {
        $sql = "UPDATE ".static::TABLE." SET name=?,body=?,type=?,assignId=? WHERE id=?";
        $st = Db::$db->prepare($sql);
        $r = $st->execute(array($this->name,$this->body,$this->type,$this->assignId,$this->id));
    }


}