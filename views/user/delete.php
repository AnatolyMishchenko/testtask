<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Удалить пользователя';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'delete-user',
                'layout' => 'default',
                'fieldConfig' => [
                    'template' => "{label}{input}{error}",
                    'labelOptions' => ['class' => 'control-label col-md-2'],
                ],
            ]); ?>
            <?= $form->field($model, 'username')->textInput(['value' => $info['username'], 'readonly' => true]) ?>
            <div class="form-group">
                <?= Html::submitButton('Удалить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>