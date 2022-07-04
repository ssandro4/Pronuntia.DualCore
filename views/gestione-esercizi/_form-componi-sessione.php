<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Sessione;
use app\models\Esercizio;


/* @var $this yii\web\View */
/* @var $model app\models\Composizionesessione */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="composizionesessione-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sessione')
      ->dropDownList(ArrayHelper::map(Sessione::find()->where(['logopedista'=>Yii::$app->user->identity->idLogopedista])->all(),'idSessione','idSessione'))
 ?>
 <?= $form->field($model, 'esercizio')
      ->dropDownList(ArrayHelper::map(Esercizio::find()->where(['logopedista'=>Yii::$app->user->identity->idLogopedista])->all(),'idEsercizio','idEsercizio'))
 ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
