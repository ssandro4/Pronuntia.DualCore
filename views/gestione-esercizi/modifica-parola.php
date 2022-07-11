<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parola */
?>
<style>
    .box {
        font-size: 20px;
        width: 300px;
        height: 90x;

    }

    
    .btn{
        border-radius: 8px;
        border: 2px ;
        padding: 15px;
        text-align: center;
        background-color: #555555;    
        font-size: 20px;
    }
</style>
</style>


<div class="parola-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <h2>
        Modifica Parola:   <?php echo $model['idParola'] ?>
    </h2>
    <div class="box">
        <?= $this->render('_form-modifica-parola', [
            'model' => $model,
            
        ]) ?>
    </div>
</div>