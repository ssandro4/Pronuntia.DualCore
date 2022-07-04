<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Parola */

$this->title = $model->idParola;
$this->params['breadcrumbs'][] = ['label' => 'Parolas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="parola-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['CULO', 'idParola' => $model->idParola], ['class' => 'btn btn-primary']) ?>

     <!--      
        < ?= Html::a('Delete', ['delete', 'idParola' => $model->idParola], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        -->

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idParola',
            'tag',
            'pathIMG' ,
            'pathMP3',
        ],
    ]) ?>

    <div class="container">
    <img src= <?php echo " $model->pathIMG " ?>,
            alt=<?php echo $model->idParola ?>, 
            width="300" ,
            height="300">
    </div>


</div>