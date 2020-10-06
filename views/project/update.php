<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

$this->title = 'Обновить проект';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'update-project',
                'layout' => 'default',
                'fieldConfig' => [
                    'template' => "{label}{input}{error}",
                    'labelOptions' => ['class' => 'control-label col-md-2'],
                ],
            ]); ?>
            <?= $form->field($model, 'title')->textInput(['value' => $info['title']]) ?>
            <?= $form->field($model, 'price')->textInput(['value' => $info['price']]) ?>
            <?= $form->field($model, 'startDate')->widget(DatePicker::className(), [
                'language' => 'ru-Ru',
                'dateFormat' => 'dd.MM.y',
                'clientOptions' => [
                    'yearRange' => '2020:2030',
                    'changeMonth' => 'true',
                    'changeYear' => 'true',
                    'firstDay' => '1',
                    'defaultDate' => $info['start_date'],
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
                    'defaultDate' => $info['end_date'],
                ],
            ]) ?>
            <div class="form-group">
                <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>