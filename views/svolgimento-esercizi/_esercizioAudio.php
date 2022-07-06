<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Esercizio;
use app\models\Parola;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

$id = Parola::findOne(['idParola' => $esercizio->parola])->idParola;
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

<div class="center">
    <h3>"<?php echo "$id" ?>"</h3>
    <p>Clicca play per riprodurre l'audio</p>
    <?php echo $sound?>
</iframe>

<!--
    <audio controls>
        <source src=<?php $sound ?> type="audio/mp3">
        Your browser does not support the audio element.
</audio>-->
</div>