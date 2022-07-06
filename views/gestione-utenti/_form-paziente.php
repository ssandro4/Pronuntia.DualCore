<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Caregiver;

/* @var $this yii\web\View */
/* @var $model app\models\Paziente */
/* @var $form yii\widgets\ActiveForm */
?>

<style>
    .box {
        font-size: 20px;
        width: 300px;
        height: 90x;

    }

    .boxtext {
        font-size: 20px;
        width: 300px;
        height: 300x;

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

<div class="paziente-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box">
        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="box">
        <?= $form->field($model, 'cognome')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="box">
        <a href="#" class="tip"><span>Il caregiver consente al paziente l'accesso indiretto al sistema</span>
        <?= $form->field($model, 'caregiver')
            ->dropDownList(ArrayHelper::map(Caregiver::find()->all(), 'idCaregiver', 'nomeECognome'))
        ?>
    </div>

    <div class="boxtext">
        <a href="#" class="tip"><span>Questo box serve da reminder per le patologie, i disturbi e i sintomi di cui soffre il paziente</span>
    <?= $form->field($model, 'diagnosi')->textarea(['maxlength' => true]) ?></a>
    </div class="boxtext">

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>