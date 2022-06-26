<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Composizionesessione */

$this->title = $model->sessione;
$this->params['breadcrumbs'][] = ['label' => 'Composizionesessiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="composizionesessione-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'sessione' => $model->sessione, 'esercizio' => $model->esercizio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'sessione' => $model->sessione, 'esercizio' => $model->esercizio], [
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
            'esercizio',
        ],
    ]) ?>

</div>
