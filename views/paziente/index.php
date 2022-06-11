<?php

use app\models\Paziente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PazienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pazientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paziente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Paziente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPaziente',
            'nome',
            'cognome',
            'caregiver',
            'logopedista',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Paziente $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idPaziente' => $model->idPaziente]);
                 }
            ],
        ],
    ]); ?>


</div>
