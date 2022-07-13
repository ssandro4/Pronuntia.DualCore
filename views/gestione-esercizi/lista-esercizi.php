<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EsercizioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="esercizio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->idEsercizio), ['view', 'idEsercizio' => $model->idEsercizio]);
        },
    ]) ?>


</div>