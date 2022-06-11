
<?php

use app\models\Caregiver;
use yii\helpers\Html;
use app\models\Logopedista;
use app\models\Paziente;

?>

<div class="say">
<body style="background-color:red">

<h1>  <p style = "font-family:georgia,garamond,serif;font-size:55px;font-style:italic;">
        <strong>Test</strong></h1>
</div>
<?php 
$countries = Logopedista::find()->all();
echo $countries[0]->nome;
?>

