<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Sessione;
use app\models\Paziente;


/* @var $this yii\web\View */
/* @var $model app\models\Assegnazionesessione */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assegnazionesessione-form">

    <?php $form = ActiveForm::begin(); ?>
   
   <?= $form->field($model, 'sessione')
      ->dropDownList(ArrayHelper::map(Sessione::find()->where(['logopedista'=>Yii::$app->user->identity->idLogopedista])->all(),'idSessione','idSessione'))
 ?>
     <?= $form->field($model, 'paziente')
      ->dropDownList(ArrayHelper::map(Paziente::find()->where(['logopedista'=>Yii::$app->user->identity->idLogopedista])->all(),'idPaziente','nomeECognome'))
 ?>
    
   

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
