<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paziente */

$this->title = 'Update Paziente: ' . $model->idPaziente;
$this->params['breadcrumbs'][] = ['label' => 'Pazientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPaziente, 'url' => ['view', 'idPaziente' => $model->idPaziente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paziente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-modifica-paziente', [
        'model' => $model,
    ]) ?>

</div>
