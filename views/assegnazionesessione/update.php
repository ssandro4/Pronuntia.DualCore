<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Assegnazionesessione */

$this->title = 'Update Assegnazionesessione: ' . $model->sessione;
$this->params['breadcrumbs'][] = ['label' => 'Assegnazionesessiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sessione, 'url' => ['view', 'sessione' => $model->sessione, 'paziente' => $model->paziente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="assegnazionesessione-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
