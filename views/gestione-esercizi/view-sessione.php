<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Composizionesessione;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComposizionesessioneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Composizionesessiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="composizionesessione-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Composizionesessione', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sessione',
            'esercizio',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Composizionesessione $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'sessione' => $model->sessione, 'esercizio' => $model->esercizio]);
                 }
            ],
        ],
    ]); ?>


</div>
