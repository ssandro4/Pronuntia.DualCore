<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

$this->title = 'Update Esercizio: ' . $model->idEsercizio;
$this->params['breadcrumbs'][] = ['label' => 'Esercizios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEsercizio, 'url' => ['view', 'idEsercizio' => $model->idEsercizio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="esercizio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
