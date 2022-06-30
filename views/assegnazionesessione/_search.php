<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AssegnazionesessioneSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assegnazionesessione-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'sessione') ?>

    <?= $form->field($model, 'paziente') ?>

    <?= $form->field($model, 'nuovo') ?>

    <?= $form->field($model, 'cntErrori') ?>

    <?= $form->field($model, 'elencoErrori') ?>

    <?php // echo $form->field($model, 'esito') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'dataCreazione') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
