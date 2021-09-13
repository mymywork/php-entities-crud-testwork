<?php

class Db {
    static $db = null;

    static function init() {
        Db::$db = new PDO('sqlite:./db/database.sql');
    }
}

?>