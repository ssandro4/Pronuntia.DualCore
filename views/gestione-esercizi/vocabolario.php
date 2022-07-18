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

?>

<style>
    .btn{
        border-radius: 8px;
        border: 2px ;
        padding: 15px;
        text-align: center;
        background-color: #555555;    
        font-size: 20px;
    }

</style>

<div class="gestione-esercizi-vocabolario">

    <h1><?= Html::encode($this->title) ?></h1>

    <h2>
        Vocabolario
    </h2>

    <p>
        <?= Html::a('Aggiungi Parola', ['gestione-esercizi/aggiungi-parola'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            
            'Id Parola' => 'idParola',
            'Tag' => 'tag',
            
            [
                'attribute' => 'img',
                'format' => 'html',
                'label' => 'Immagine',
                'value' => function ($model) {

                    return Html::img(
                        $model['pathIMG'],
                        ['width' => '140px', 'height' => '100px']
                    );
                },
            ],

            'File Audio' => 'pathMP3',

            [
                'class' => ActionColumn::class,
                'template' => '{update}',
                'urlCreator' => function ($action, Parola $model ) {
                    return Url::to(['gestione-esercizi/modifica-parola', 'idParola' =>  $model['idParola']]);
                },
                'header' => 'Modifica',
                'headerOptions' => ['style' => 'width:2%']
                
            ],

        ],

    ]) ?>

    <?php Pjax::end(); ?>

</div>