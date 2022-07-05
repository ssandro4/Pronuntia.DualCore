<?php

use app\models\Caregiver;
use yii\helpers\Html;
use app\models\Logopedista;
use app\models\Parola;
use app\models\Paziente;
use app\models\Sessione;
?>


<?= Html::beginForm(['gestione-esercizi/aggiungi-parola'], 'post', ['enctype' =>
'multipart/form-data']) ?>
<?= Html::submitButton('Submit', ['class' => 'submit']) ?>
<?= Html::endForm() ?>


<?php
$msg = Sessione::findOne('idSessione' == 'oipougytfdrf')->getComposizionesessiones()->all();
if (Sessione::findOne('idSessione' == 'gianni')->getComposizionesessiones()->all())
        echo $msg[0]->esercizio;

$sql = Parola::find()->all();

foreach ($sql as $row) { //Array or records stored in $row

        echo "<option value=$row[idParola]>$row[idParola]</option>";
        /* Option values are added by looping through the array */
}

?>





<div class="say">

        <body style="background-color:red">

                <h1>
                        <p style="font-family:georgia,garamond,serif;font-size:55px;font-style:italic;">
                                <strong>Teeeeest</strong>
                </h1>
</div>

<?php $model = Parola::findOne(['idParola' => 'cane']);
?>
<audio controls='controls'>
        <source src='app/src/gatto.mp3' />
</audio>
<div class="container">
        <img src=<?php echo $model->pathIMG ?> alt=<?php echo $model->idParola ?> , width="300" , height="300">
</div>
<?php echo "$model->pathIMG" ?>

<?php
$countries = Logopedista::find()->all();
//echo $countries[0]->nome;

//$sql="SELECT name,id FROM student"; 

$sql = Parola::find()->all();

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

echo "<select name=student value=''>Student Name</option>"; // list box select command

foreach ($sql as $row) { //Array or records stored in $row

        echo "<option value=$row[idParola]>$row[idParola]</option>";

        /* Option values are added by looping through the array */
}

echo "</select>"; // Closing of list box
?>