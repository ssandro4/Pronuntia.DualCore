<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sessione */

$this->title = 'Create Sessione';
$this->params['breadcrumbs'][] = ['label' => 'Sessiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sessione-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
