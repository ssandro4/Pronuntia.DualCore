<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EsercizioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Esercizios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="esercizio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Esercizio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idEsercizio',
            'parola',
            'parola2',
            'tipo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Esercizio $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idEsercizio' => $model->idEsercizio]);
                 }
            ],
        ],
    ]); ?>


</div>
