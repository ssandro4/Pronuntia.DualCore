<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Composizionesessione */

$this->title = 'Update Composizionesessione: ' . $model->sessione;
$this->params['breadcrumbs'][] = ['label' => 'Composizionesessiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sessione, 'url' => ['view', 'sessione' => $model->sessione, 'esercizio' => $model->esercizio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="composizionesessione-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
