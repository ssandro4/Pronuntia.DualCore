<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Assegnazionesessione */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assegnazionesessione-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sessione')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paziente')->textInput() ?>

    <?= $form->field($model, 'nuovo')->textInput() ?>

    <?= $form->field($model, 'cntErrori')->textInput() ?>

    <?= $form->field($model, 'elencoErrori')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'esito')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dataCreazione')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
