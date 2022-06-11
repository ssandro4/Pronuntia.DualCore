<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */

$this->title = $model->idCaregiver;
$this->params['breadcrumbs'][] = ['label' => 'Caregivers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="caregiver-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idCaregiver' => $model->idCaregiver], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idCaregiver' => $model->idCaregiver], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idCaregiver',
            'nome',
            'cognome',
            'email:email',
            'password',
            'authKey',
            'accessToken',
        ],
    ]) ?>

</div>
