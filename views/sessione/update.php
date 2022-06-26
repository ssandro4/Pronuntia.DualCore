<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sessione */

$this->title = 'Update Sessione: ' . $model->idSessione;
$this->params['breadcrumbs'][] = ['label' => 'Sessiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSessione, 'url' => ['view', 'idSessione' => $model->idSessione]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sessione-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
