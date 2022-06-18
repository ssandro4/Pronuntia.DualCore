<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Paziente */

$this->title = $model->idPaziente;
$this->params['breadcrumbs'][] = ['label' => 'Pazientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="paziente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idPaziente' => $model->idPaziente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idPaziente' => $model->idPaziente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPaziente',
            'nome',
            'cognome',
            'diagnosi',
            'caregiver',
            'logopedista',
        ],
    ]) ?>

</div>
