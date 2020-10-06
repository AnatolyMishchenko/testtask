<?php

use yii\helpers\Html;

$this->title = 'Список пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="signup-user"><a class="btn btn-success" href="/user/signup">Создать нового пользователя</a></div>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Логин</th>
            <th>ФИО</th>
            <th>Обновить</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($userList as $userListItem) { ?>
            <tr>
                <td><?php echo $userListItem['id']; ?></td>
                <td><?php echo $userListItem['username']; ?></td>
                <td><?php echo $userListItem['fio']; ?></td>
                <td><a href="/user/update/<?php echo $userListItem['id']; ?>">Обновить</a></td>
                <td><a href="/user/delete/<?php echo $userListItem['id']; ?>">Удалить</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>