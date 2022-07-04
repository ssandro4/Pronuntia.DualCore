<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parola */

$this->title = 'Update Parola: ' . $model->idParola;
$this->params['breadcrumbs'][] = ['label' => 'Parolas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idParola, 'url' => ['view', 'idParola' => $model->idParola]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="parola-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>