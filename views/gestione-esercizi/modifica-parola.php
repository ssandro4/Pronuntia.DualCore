<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parola */

$this->title = 'Update Parola: ' . $model->idParola;
$this->params['breadcrumbs'][] = ['label' => 'Parolas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idParola, 'url' => ['view', 'idParola' => $model->idParola]];
$this->params['breadcrumbs'][] = 'Update';
?>
<style>
    .box {
        font-size: 20px;
        width: 300px;
        height: 90x;

    }
</style>

<div class="parola-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="box">
        <?= $this->render('_form-modifica-parola', [
            'model' => $model,
        ]) ?>
    </div>
</div>