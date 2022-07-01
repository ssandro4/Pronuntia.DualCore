<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Sessione;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SessioneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sessiones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sessione-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sessione', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idSessione',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sessione $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idSessione' => $model->idSessione]);
                 }
            ],
        ],
    ]); ?>


</div>
