<?php

use app\models\Parola;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ParolaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parolas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parola-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Parola', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

<!--
    < ?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->idParola), ['view', 'idParola' => $model->idParola]);
        },
    ]) ?>
-->

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
