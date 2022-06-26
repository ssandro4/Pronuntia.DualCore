<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Esercizio;
/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

?>

<div class="svolgiesercizio">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEsercizio',
            'parola',
            'parola2',
            'tipo',
        ],
    ]) ?>
</div>
