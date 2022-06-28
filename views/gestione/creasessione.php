<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sessione */

$this->title = 'Create Sessione';
$this->params['breadcrumbs'][] = ['label' => 'Sessiones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sessione-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="sessione-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($sessione, 'idSessione')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>