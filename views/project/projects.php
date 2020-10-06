<?php

use yii\helpers\Html;

$this->title = 'Список проектов';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="signup-user"><a class="btn btn-success" href="/project/create">Создать новый проект</a></div>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Название</th>
            <th>Цена</th>
            <th>Дата начала</th>
            <th>Дата сдачи</th>
            <th>Обновить</th>
            <th>Удалить</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($projectList as $projectListItem) { ?>
            <tr>
                <td><?php echo $projectListItem['id']; ?></td>
                <td><?php echo $projectListItem['title']; ?></td>
                <td><?php echo $projectListItem['price']; ?></td>
                <td><?php echo $projectListItem['start_date']; ?></td>
                <td><?php echo $projectListItem['end_date']; ?></td>
                <td><a href="/project/update/<?php echo $projectListItem['id']; ?>">Обновить</a></td>
                <td><a href="/project/delete/<?php echo $projectListItem['id']; ?>">Удалить</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>