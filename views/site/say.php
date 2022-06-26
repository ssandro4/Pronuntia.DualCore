
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

<h1>  <p style = "font-family:georgia,garamond,serif;font-size:55px;font-style:italic;">
        <strong>Test</strong></h1>
</div>



<div class="container">
  <img src= <?php ?>, alt=<?php ?>    
        width="300" 
        height="300">

</div>
<button class="btn btn-lg btn-primary">Button</button>

<?php 
$countries = Logopedista::find()->all();
//echo $countries[0]->nome;

//$sql="SELECT name,id FROM student"; 


/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

echo "<select name=student value=''>Student Name</option>"; // list box select command

foreach ($sql as $row){//Array or records stored in $row

echo "<option value=$row[idParola]>$row[idParola]</option>"; 

/* Option values are added by looping through the array */ 


}

 echo "</select>";// Closing of list box
 ?>