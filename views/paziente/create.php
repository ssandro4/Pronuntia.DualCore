<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paziente */

$this->title = 'Create Paziente';
$this->params['breadcrumbs'][] = ['label' => 'Pazientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paziente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
