<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */
/* @var $form ActiveForm */
?>
<div class="site-creacaregiver">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'idCaregiver') ?>
        <?= $form->field($model, 'nome') ?>
        <?= $form->field($model, 'cognome') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'password') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-creacaregiver -->
