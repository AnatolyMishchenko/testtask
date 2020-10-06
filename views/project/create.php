<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

$this->title = 'Создать новый проект';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'create-project',
                'layout' => 'default',
                'fieldConfig' => [
                    'template' => "{label}{input}{error}",
                    'labelOptions' => ['class' => 'control-label col-md-2'],
                ],
            ]); ?>
            <?= $form->field($model, 'title')->textInput() ?>
            <?= $form->field($model, 'price')->textInput(['type' => 'number']) ?>
            <?php $dateDefault = date('d.m.Y'); ?>
            <?= $form->field($model, 'startDate')->widget(DatePicker::className(), [
                'language' => 'ru-Ru',
                'dateFormat' => 'dd.MM.y',
                'clientOptions' => [
                    'yearRange' => '2020:2030',
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'firstDay' => '1',
                    'defaultDate' => $dateDefault,
                ],
            ]) ?>
            <?= $form->field($model, 'endDate')->widget(DatePicker::className(), [
                'language' => 'ru-Ru',
                'dateFormat' => 'dd.MM.y',
                'clientOptions' => [
                    'yearRange' => '2020:2030',
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'firstDay' => '1',
                    'defaultDate' => $dateDefault,
                ],
            ]) ?>
            <div class="form-group">
                <?= Html::submitButton('Создать', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>