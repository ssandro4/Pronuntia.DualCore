<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */

?>
<div class="caregiver-update">
<h2>
       Modifica Dati:
    </h2>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-caregiver', [
        'model' => $model,
    ]) ?>

</div>
