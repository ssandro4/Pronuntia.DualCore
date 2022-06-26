<?php

use app\models\Caregiver;
use yii\helpers\Html;
use app\models\Logopedista;
use app\models\Parola;
use app\models\Paziente;
?>

<?php 
$sql=Parola::find()->all();

foreach ($sql as $row){//Array or records stored in $row

        echo "<option value=$row[idParola]>$row[idParola]</option>"; 
        /* Option values are added by looping through the array */ 
        }
        
 ?>





<div class="say">

        <body style="background-color:red">

                <h1>
                        <p style="font-family:georgia,garamond,serif;font-size:55px;font-style:italic;">
                                <strong>Test</strong>
                </h1>
</div>

<?php $model = Parola::findOne(['idParola' => 'cane']);
?>
<audio controls='controls'>
        <source src='" . $model->ficheiro  .   "' type='audio/mp3' />
</audio>
<div class="container">
        <img src=<?php echo $model->pathIMG ?> alt=<?php echo $model->idParola ?> , width="300" , height="300">
</div>
<<<<<<< Updated upstream



<div class="container">
  <img src= <?php ?>, alt=<?php ?>    
        width="300" 
        height="300">

</div>
<button class="btn btn-lg btn-primary">Button</button>

<?php 
=======
<?php echo "$model->pathIMG" ?>

<?php
>>>>>>> Stashed changes
$countries = Logopedista::find()->all();
//echo $countries[0]->nome;

//$sql="SELECT name,id FROM student"; 

<<<<<<< Updated upstream
=======
$sql = Parola::find()->all();
>>>>>>> Stashed changes

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

echo "<select name=student value=''>Student Name</option>"; // list box select command

foreach ($sql as $row) { //Array or records stored in $row

        echo "<option value=$row[idParola]>$row[idParola]</option>";

<<<<<<< Updated upstream

=======
        /* Option values are added by looping through the array */
>>>>>>> Stashed changes
}

echo "</select>"; // Closing of list box
?>