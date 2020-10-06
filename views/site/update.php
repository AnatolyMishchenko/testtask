<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin([
    'id' => 'update-user',
    'layout' => 'default',
    'fieldConfig' => [
        'template' => "{label}<span class='star'>*</span><div class='col-md-6'>{input}</div>",
        'labelOptions' => ['class' => 'control-label col-md-2'],
    ],
]); ?>


<?= $form->field($model, 'status')
    ->dropDownList([
        '10' => 'Активный',
        '0' => 'Не активный',
    ],
        [
            'prompt' => $status
        ]) ?>
<?= $form->field($model, 'situation')->textarea(['rows' => 5, 'cols' => 10]) ?>
<div class="form-group">
    <label class="control-label col-md-4 tt text-left">Контактная информация для обратной связи</label>
</div>
<?= $form->field($model, 'name')->textInput() ?>
<?= $form->field($model, 'phone')->textInput() ?>
<?= $form->field($model, 'email')->textInput() ?>
<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'request-call-button', 'name' => 'profile-button']) ?>
</div>
<?php ActiveForm::end(); ?>

