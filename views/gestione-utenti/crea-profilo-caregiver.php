<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caregiver */

?>
<div class="caregiver-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <h2>
       Crea profilo Caregiver
    </h2>
    <?= $this->render('_form-caregiver', [
        'model' => $model,
    ]) ?>

</div>
