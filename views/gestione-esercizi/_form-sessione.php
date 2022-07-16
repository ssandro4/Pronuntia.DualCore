<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sessione */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .box {
        font-size: 20px;
        width: 300px;
        height: 90x;

    }

    .btn{
        border-radius: 8px;
        border: 2px ;
        padding: 15px;
        text-align: center;
        background-color: #555555;    
        font-size: 20px;
    }
    .center {
        margin: 30 auto;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }

    a.tip {
        border-bottom: 1px dashed;
        text-decoration: none
    }

    a.tip:hover {
        cursor: help;
        position: relative
    }

    a.tip span {
        display: none
    }

    a.tip:hover span {
        border: #c0c0c0 1px;
        padding: 5px 20px 5px 5px;
        display: block;
        z-index: 100;
        background: #f0f0f0 no-repeat 100% 5%;
        left: 300px;
        margin: 10px;
        width: 300px;
        position: absolute;
        top: 10px;
        text-decoration: none
    }
</style>



<div class="sessione-form">


    <h3>Creazione sessione</h3>

    <?php $form = ActiveForm::begin(); ?>


    <div class="box">
        <a href="#" class="tip"><span>Si consiglia di nominare la sessione in base alla tipologia di esercizi contenuti in modo da essere riconoscibile.
            Una sessione può essere assegnata a più pazienti
        </span>
    <?= $form->field($model, 'idSessione')->textInput(['maxlength' => true]) ?></a>
    </div>

    <div class="box">
        <a href="#" class="tip"><span>Seleziona il numero massimo di esercizi che saranno contenuti nella sessione</span>
    <?= $form->field($model, 'numEsercizi')->textInput(['type'=>'number','min'=>1, 'max'=>20]) ?></a>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
