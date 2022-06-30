<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AssegnazionesessioneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Assegnazionesessiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assegnazionesessione-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Assegnazionesessione', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sessione',
            'paziente',
            'nuovo',
            'cntErrori',
            'elencoErrori',
            //'esito',
            //'note',
            //'dataCreazione',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Assegnazionesessione $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'sessione' => $model->sessione, 'paziente' => $model->paziente]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
