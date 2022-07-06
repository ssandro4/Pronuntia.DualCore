<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Parola;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */
/* @var $form yii\widgets\ActiveForm */

?>
<style>
    .box {
        font-size: 20px;
        width: 300px;
        height: 90x;

    }

    .boxradio {
        font-size: 20px;
        width: 400px;
        height: 120x;

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

<div class="esercizio-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box">
        <a href="#" class="tip"><span>Si consiglia di nominare l'esercizio con una nomenclatura del tipo: "parola"-"tipo"</span>
            <?= $form->field($model, 'idEsercizio')->textInput(['maxlength' => true])->label('Nome Esercizio') ?> </a>
    </div>

    <div class="box">
        <a href="#" class="tip"><span>Nel caso di un esercizio di tipo "Coppia Minima" la parola principale sarà ritenuta
                come quella corretta</span>
            <?= $form->field($model, 'parola')
                ->dropDownList(ArrayHelper::map(Parola::find()->all(), 'idParola', 'idParola'))->label('Parola principale') ?></a>
    </div>

    <div class="boxradio">
        <a href="#" class="tip"><span>Un esercizio di tipo Audio riproduce il video appartenente alla parola;
                Un esercizio di tipo Immagine mostra l'immagine associata alla parola;
                Un esercizio di tipo Coppia Minima mostra le immagini associate alle due parole e riproduce il video appartenente alla parola principale;
            </span>
            <?= $form->field($model, 'tipo')->radioList([
                'Audio' => 'Audio',
                'Immagine' => 'Immagine',
                'Coppia Minima' => 'Coppia Minima'
            ]); ?> </a>
    </div>

    <div class="box">
        <a href="#" class="tip"><span>Si consiglia di lasciare "Parola2" nel caso la categoria dell'esercizio non necessiti di due parole</span>
            <?= $form->field($model, 'parola2')
                ->dropDownList(ArrayHelper::map(Parola::find()->all(), 'idParola', 'idParola'))->label('Parola secondaria') ?></a>
    </div>

    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>


<?php ActiveForm::end(); ?>

</div>