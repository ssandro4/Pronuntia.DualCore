<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Logopedista;

/* @var $this yii\web\View */
/* @var $model app\models\Paziente */

\yii\web\YiiAsset::register($this);
?>
<div class="paziente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idPaziente' => $model->idPaziente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idPaziente' => $model->idPaziente], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Sei sicuro di voler eliminare?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPaziente',
            'nome',
            'cognome',
            'diagnosi',
            'caregiver',
            'logopedista',
            ['label'=>'Nome',
            'value'=> 
            Logopedista::findOne(['idLogopedista'=>$model->logopedista])->nome . Logopedista::findOne(['idLogopedista'=>$model->logopedista])->cognome]
        ],
    ]) ?>

</div>
