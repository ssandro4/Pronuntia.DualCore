<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Caregiver;

/* @var $this yii\web\View */
/* @var $model app\models\Paziente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paziente-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'caregiver')
      ->dropDownList(ArrayHelper::map(Caregiver::find()->all(),'idCaregiver','nomeECognome'))
 ?>
    <?= $form->field($model, 'diagnosi')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
