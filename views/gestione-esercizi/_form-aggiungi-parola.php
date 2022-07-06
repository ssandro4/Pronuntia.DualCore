<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Parola */
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


<div class="center">
    <h3>Aggiungi una parola al vocabolario</h3>
</div>

<div class="parola-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="box">
        <a href="#" class="tip"><span>Ricorda: la parola deve essere unica, non possono esserci due parole uguali!</span>
            <?= $form->field($model, 'idParola')->textInput(['maxlength' => true])->label('Parola')  ?> </a>
    </div>

    <div class="box">
        <a href="#" class="tip"><span>I tag servono a semplificare la ricerca di una parola</span>
            <?= $form->field($model, 'tag')->textInput(['maxlength' => true])->label('Tags')  ?> </a>
    </div>

    <div class="box">
        <a href="#" class="tip"><span>Poi utilizzare qualsiasi immagine presa dal web! Basta inserirne l'indirizzo facendo click col tasto destro sull'immagine selezionata,
             selezionare ''copia l'indirizzo dell'imagine'' e incollarlo in questo campo</span>
            <?= $form->field($model, 'pathIMG')->textInput(['maxlength' => true])->label('Url immagine')  ?> </a>
    </div>

    <div class="box">
        <a href="#" class="tip"><span>Viene utilizzato negli esercizi di tipo audio: bisogna inserire il link incorporamento del video desiderato.
            Sulla piattaforma Youtube basta selezionare condividi e successivamente incopora e dunque incollare in questo campo l'url del video
        </span>
            <?= $form->field($model, 'pathMP3')->textInput(['maxlength' => true])->label('Url video')  ?> </a>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>