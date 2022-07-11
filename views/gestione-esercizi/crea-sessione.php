<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sessione */

//$this->title = 'Create Sessione';
?>
<div class="sessione-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-sessione', [
        'model' => $model,
    ]) ?>

</div>
