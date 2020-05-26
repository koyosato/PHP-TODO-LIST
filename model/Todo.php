<?php
require_once('./../../config/db.php');
class Todo {
    public static function findByQuery($query) {
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query($query);

    if($stmh) {
        $todo_list = $stmh->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $todo_list = array();
    }

        return $todo_list;
    }

    public static function findAll() {
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query('select * from todos');

    if($stmh) {
        $todo_list = $stmh->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $todo_list = array();
    }

        return $todo_list;
    }

    public static function findById($todo_id) {
        $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $stmh = $pdo->query(sprintf('select * from todos where id = %s;', $todo_id));

    if($stmh) {
        $todo = $stmh->fetch(PDO::FETCH_ASSOC);
    } else {
        $todo = array();
    }

        return $todo;
    }
}