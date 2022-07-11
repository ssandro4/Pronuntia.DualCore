<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\Parola;
/* @var $this yii\web\View */
/* @var $searchModel app\models\parolasearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vocabolario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gestione-esercizi-vocabolario">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Parola', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        
        'Id Parola' =>'idParola',
        'Tag' => 'tag',
        
        [

            'attribute' => 'img',
            'format' => 'html',
            'label' => 'Immagine',

            'value' => function ($model) {

                return Html::img( $model['pathIMG'],
                    ['width' => '140px','height' => '100px' ]);
            },
        ],
        
        'File Audio' => 'pathMP3',

        [
            'class' => ActionColumn::className(),
            'urlCreator' => function ($action, Parola $model, $key, $index, $column) {
                return Url::toRoute([$action, 'idParola' => $model->idParola]);
             }
        ],

    ],
    
]) ?>

    <?php Pjax::end(); ?>

</div>