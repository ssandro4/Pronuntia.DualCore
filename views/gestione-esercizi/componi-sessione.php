<?php

use yii\helpers\Html;
use yii\bootstrap4\Modal;
use app\models\Esercizio;

/* @var $this yii\web\View */
/* @var $model app\models\Composizionesessione */

?>
<div class="composizionesessione-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-componi-sessione', [
        'arrModels' => $arrModels,
    ]) ?>
<p><a href="crea-esercizio-popup">Crea un nuovo esercizio</a></p>

</div>
