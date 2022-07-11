<?php

use app\models\Paziente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PazienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
 

?>
<div class="paziente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Pazienti</h3>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'nome',
            'cognome', 
            'diagnosi',

            [
                'class' => ActionColumn::class,
                'template' => '{update}',
                'urlCreator' => function ($action, Paziente $model ) {
                    return Url::to(['gestione-utenti/modifica-profilo-paziente', 'idPaziente' =>  $model['idPaziente']]);;
                },
                'header' => 'Modifica',
                'headerOptions' => ['style' => 'width:1%']
                
            ],

            [
                'class' => ActionColumn::class,
                'template' => '{view}',
                'urlCreator' => function ($action, Paziente $model ) {
                    return Url::to(['controllo-terapia/progressi', 'idPaziente' =>  $model['idPaziente']]);;
                },
                'header' => 'Progressi',
                'headerOptions' => ['style' => 'width:1%']
                
            ],

            [
                'class' => ActionColumn::class,
                'template' => '{delete}',
                'urlCreator' => function ($action, Paziente $model ) {
                    return Url::to(['gestione-utenti/elimina-profilo-paziente', 'idPaziente' =>  $model['idPaziente']]);;
                },
                'header' => 'Elimina',
                'headerOptions' => ['style' => 'width:1%']
                
            ],
        ],
    ]); ?>


</div>
