<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Assegnazionesessione */


?>
<div class="assegnazionesessione-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-assegna-sessione', [
        'model' => $model,
    ]) ?>

</div>
