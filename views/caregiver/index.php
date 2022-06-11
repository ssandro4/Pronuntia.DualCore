<?php

use app\models\Caregiver;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CaregiverSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Caregivers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caregiver-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Caregiver', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idCaregiver',
            'nome',
            'cognome',
            'email:email',
            'password',
            //'authKey',
            //'accessToken',
           /* [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Caregiver $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idCaregiver' => $model->idCaregiver]);
                 }
            ],*/
        ],
    ]); ?>


</div>
