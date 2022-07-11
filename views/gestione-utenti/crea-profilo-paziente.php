<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Paziente */

?>
<div class="paziente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-paziente', [
        'model' => $model,
    ]) ?>
<p><p><a href="crea-profilo-caregiver-popup">Registra un nuovo caregiver</a></p>
</div>
