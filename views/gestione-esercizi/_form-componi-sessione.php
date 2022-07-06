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

<style>
    .box {
        font-size: 20px;
        width: 300px;
        height: 90x;

    }

    .center {
        margin: 30 auto;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }

    a.tip {
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

<div class="composizionesessione-form">

    <h3>Seleziona gli esercizi della sessione</h3>

    <?php $form = ActiveForm::begin(); ?>

    <div class="box">
        <?php
        $esercizi = array();
        for ($k = 0; $k < sizeof($arrModels); $k++) {
            $model = $arrModels[$k];

            echo $form->field($model, '[' . $k . ']esercizio')->dropDownList(ArrayHelper::map(Esercizio::find()->where(['logopedista' => Yii::$app->user->identity->idLogopedista])->all(), 'idEsercizio', 'idEsercizio'));
        }
        ?>
    </div>

    <div class="box">
        <a href="#" class="tip"><span>Una volta salvata non sarà possibile modificare la sessione!</span>
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div></a>
</div>

<?php ActiveForm::end(); ?>

</div>