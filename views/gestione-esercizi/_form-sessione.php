<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sessione */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sessione-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idSessione')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'numEsercizi')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
