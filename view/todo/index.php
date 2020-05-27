<?php
require_once('./../../controller/TodoController.php');

$controller = new TodoController();
$todo_list = $controller->index();

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODOリスト</title>
</head>
<body>
    <?php if($todo_list): ?>
        <ul>
            <?php foreach($todo_list as $todo):?>
            <li><a href="./detail.php?todo_id=<?php echo $todo['id'] ?>"><?php echo $todo['title'];?></a> : <?php echo $todo['display_status'];?></li>
            <?php endforeach;?>
        </ul>
        <?php else:?>
        <p>データなし</p>
        <?php endif;?>
</body>
</html>