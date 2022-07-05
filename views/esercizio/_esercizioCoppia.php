<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Esercizio;
use app\models\Parola;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

$img = Parola::findOne(['idParola' => $esercizio->parola])->pathIMG;
$img2 = Parola::findOne(['idParola' => $esercizio->parola2])->pathIMG;
$id = Parola::findOne(['idParola' => $esercizio->parola])->idParola;
$id2 = Parola::findOne(['idParola' => $esercizio->parola2])->idParola;
$rand = rand(0, 999);
$sound = Parola::findOne(['idParola' => $esercizio->parola])->pathMP3;
?>

<style>
    .center {
        margin: 30 auto;
        margin-left: auto;
        margin-right: auto;
        text-align: center;
    }
</style>


<h3>"<?php echo "$id" ?>"</h3>

<div>
    <?php if ($rand % 2 == 0) : ?>

        <img src=<?php echo " $img " ?>, alt=<?php echo "$id" ?>, width="300" , height="300" ; style="border-radius: 12px;  border: 5px solid black;">
        <img src=<?php echo " $img2 " ?>, alt=<?php echo "$id2" ?>, width="300" , height="300" ; style="border-radius: 12px;  border: 5px solid black;">

<?php else : ?>

    <img src=<?php echo " $img2 " ?>, alt=<?php echo "$id2" ?>, width="300" , height="300" ; style="border-radius: 12px;  border: 5px solid black;">
    <img src=<?php echo " $img " ?>, alt=<?php echo "$id" ?>, width="300" , height="300" ; style="border-radius: 12px;  border: 5px solid black;">

<?php endif; ?>

<div class ="box">
<div class ="center">
    <h3>"<?php echo "$id" ?>"</h3>
    <p>Clicca play per riprodurre l'audio</p>
    <?php echo $sound?>
    </div>
    </div>

    
</div>
