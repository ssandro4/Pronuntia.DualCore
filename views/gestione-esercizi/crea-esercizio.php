<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

?>
<style>
    .btn {
        border-radius: 8px;
        border: 2px;
        padding: 15px;
        text-align: center;
        background-color: #555555;
        font-size: 20px;
    }
</style>
<div class="esercizio-create">

<h2>
        Crea Esercizio
    </h2>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-esercizio', [
        'model' => $model,
    ]) ?>

    <p><a href="aggiungi-parola-popup">Aggiungi una nuova parola</a></p>


</div>