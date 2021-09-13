<?php

class Entity {

    protected $db;
    public $id;

    static function createTable() {
        Db::$db->exec("CREATE TABLE ".static::TABLE." (id INTEGER PRIMARY KEY , name TEXT, body TEXT) ");
    }

    static function fetchAll() {
        $sql = "SELECT * from ".static::TABLE;
        //print($sql);
        $st = Db::$db->query($sql);
        $st->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        //print(get_called_class());
        $list = $st->fetchAll();
        return $list;
    }

    static function fetchById($id) {
        $sql = "SELECT * from ".static::TABLE." where id=?";
        $st = Db::$db->prepare($sql);
        $st->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        //print(get_called_class());
        $st->execute(array($id));
        $list = $st->fetch();
        if (!$list) throw new Exception("Object not found.");
        return $list;
    }

    function insert() {
        $str = "INSERT INTO ".static::TABLE."(name,body) VALUES (?,?)";
        $st = Db::$db->prepare($str);
        $r = $st->execute(array($this->name,$this->body));
        $this->id = Db::$db->lastInsertId();
        print_r($this->id);
    }

    function delete() {
        $sql = "DELETE FROM ".static::TABLE." WHERE id=?";
        $st = Db::$db->prepare($sql);
        $r = $st->execute(array($this->id));
    }

    function update() {
        $sql = "UPDATE ".static::TABLE." SET name=?,body=? WHERE id=?";
        $st = Db::$db->prepare($sql);
        $r = $st->execute(array($this->name,$this->body,$this->id));
    }

}