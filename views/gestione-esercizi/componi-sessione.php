<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Composizionesessione */

//$this->title = 'Create Composizionesessione';
$this->params['breadcrumbs'][] = ['label' => 'Composizionesessiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="composizionesessione-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-componi-sessione', [
        'arrModels' => $arrModels,
    ]) ?>

</div>
