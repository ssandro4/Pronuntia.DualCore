<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paziente */
?>
<div class="paziente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-modifica-paziente', [
        'model' => $model,
    ]) ?>

</div>
