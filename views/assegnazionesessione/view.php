<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Assegnazionesessione */

$this->title = $model->sessione;
$this->params['breadcrumbs'][] = ['label' => 'Assegnazionesessiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="assegnazionesessione-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'sessione' => $model->sessione, 'paziente' => $model->paziente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'sessione' => $model->sessione, 'paziente' => $model->paziente], [
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
            'sessione',
            'paziente',
            'nuovo',
            'cntErrori',
            'elencoErrori',
            'esito',
            'note',
            'dataCreazione',
        ],
    ]) ?>

</div>
