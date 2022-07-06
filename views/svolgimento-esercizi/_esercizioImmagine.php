<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\models\Esercizio;
use app\models\Parola;

/* @var $this yii\web\View */
/* @var $model app\models\Esercizio */

$img=Parola::findOne(['idParola'=>$esercizio->parola])->pathIMG;
$id=Parola::findOne(['idParola'=>$esercizio->parola])->idParola;
?>

<style>
.center
{
margin: 30 auto;
margin-left: auto;
margin-right: auto;
text-align:center;
}
</style>

<div class ="center">
                <h3>"<?php echo "$id" ?>"</h3>
                <img src= <?php echo " $img " ?>,
                        alt=<?php echo "$id" ?>, 
                        width="300" ,
                        height="300"; style="border-radius: 12px;  border: 5px solid black;"
                        >
                </div>