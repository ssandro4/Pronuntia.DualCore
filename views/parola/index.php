<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ListView;

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

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model->idParola), ['view', 'idParola' => $model->idParola]);
        },
    ]) ?>


</div>