<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Parola */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parola-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pathIMG')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pathMP3')->textInput(['maxlength' => true]) ?>

    <div class="form-group"> 
        <?= Html::submitButton('Salva', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?= Html::a('Torna al vocabolario', ['gestione-esercizi/vocabolario'], ['class' => 'btn btn-success']) ?>
</div>