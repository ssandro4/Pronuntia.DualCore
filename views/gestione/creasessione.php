<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;
use yii\models\Composizionesessione;
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

    <?php ActiveForm::end();
    
     
    Modal::begin([

        'toggleButton' => [
        
            'label' => '<i class="glyphicon glyphicon-plus"></i> Add',
        
            'class' => 'btn btn-success'
        
        ],
        
        'closeButton' => [
        
          'label' => 'Close',
        
          'class' => 'btn btn-danger btn-sm pull-right',
        
        ],
        
        'size' => 'modal-lg',
        
        ]);
        
        $myModel = new Composizionesessione();
        
        echo $this->render('creacomposizione', ['composizione' => $myModel]);
        
        Modal::end();
    
    ?>
    

</div>

</div>