<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Parola */

//$this->title = 'Aggiungi una parola al vocabolario';
$this->params['breadcrumbs'][] = ['label' => 'Parolas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="parola-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form-aggiungi-parola', [
        'model' => $model,
    ]) ?>

</div>