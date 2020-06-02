<?php
require_once('./../../model/Todo.php');

class TodoController {
    public function index() {
        $todo_list = Todo::findAll(); 
        return $todo_list;
    }

    public function detail() {
        $todo_id = $_GET['todo_id'];

        $todo = Todo::findById($todo_id);

        return $todo;
    }

    public function new() {
        $title = $_POST['title'];
        $detail = $_POST['detail'];

        $validation = new TodoValidation;
        $validation->setData($data);
        if($validation->check() === false) {
            $params = sprintf("title=%s&detail=%s", $title, $detail);
            header("Location: ./new/php" . $params);
        }

        $validate_data = $validation->getData();
        $title = $validate_data['title'];
        $detail = $validate_data['detail'];

        $todo = new Todo;
        $todo->setTitle($title);
        $todo->setDetail($detail);
        $todo->save();

        if($result === false) {
            $params = sprintf("title=%s&detail=%s", $title, $detail);
            header( "Location: ./new.php" . $params);    
        }
        header( "Location: ./index.php" );
    }
}