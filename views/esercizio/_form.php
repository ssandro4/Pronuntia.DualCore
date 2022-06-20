<?php

use app\models\Caregiver;
use app\models\ParolaSearch;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="esercizio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idEsercizio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parola')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parola2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->dropDownList([ 'Audio' => 'Audio', 'Immagine' => 'Immagine', 'Coppia Minima' => 'Coppia Minima', ], ['prompt' => '']) ?>
    


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
