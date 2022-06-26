<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sessione */

$this->title = $model->idSessione;
$this->params['breadcrumbs'][] = ['label' => 'Sessiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sessione-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idSessione' => $model->idSessione], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idSessione' => $model->idSessione], [
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
            'idSessione',
        ],
    ]) ?>

</div>
