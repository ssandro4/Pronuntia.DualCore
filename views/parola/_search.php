<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ParolaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parola-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idParola') ?>

    <?= $form->field($model, 'tag') ?>

    <?= $form->field($model, 'pathIMG') ?>

    <?= $form->field($model, 'pathMP3') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>