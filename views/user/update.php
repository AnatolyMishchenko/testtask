<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Создать нового пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'update-user',
                'layout' => 'default',
                'fieldConfig' => [
                    'template' => "{label}{input}{error}",
                    'labelOptions' => ['class' => 'control-label col-md-2'],
                ],
            ]); ?>
            <?= $form->field($model, 'username')->textInput(['value' => $info['username']]) ?>
            <?= $form->field($model, 'fio')->textInput(['value' => $info['fio']]) ?>
            <p>Не заполняйте поле пароль, чтобы оставить его без изменений!</p>
            <?= $form->field($model, 'passwordUpdate')->passwordInput() ?>
            <div class="form-group">
                <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>