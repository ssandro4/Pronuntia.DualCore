
<?php

use app\models\Caregiver;
use yii\helpers\Html;
use app\models\Logopedista;
use app\models\Parola;
use app\models\Paziente;

?>

<div class="say">
<body style="background-color:red">

<h1>  <p style = "font-family:georgia,garamond,serif;font-size:55px;font-style:italic;">
        <strong>Test</strong></h1>
</div>
<?php 
$countries = Logopedista::find()->all();
//echo $countries[0]->nome;
echo 'dio ';

//$sql="SELECT name,id FROM student"; 

$sql=Parola::find()->all(); 

/* You can add order by clause to the sql statement if the names are to be displayed in alphabetical order */

echo "<select name=student value=''>Student Name</option>"; // list box select command

foreach ($sql as $row){//Array or records stored in $row

echo "<option value=$row[idParola]>$row[idParola]</option>"; 

/* Option values are added by looping through the array */ 

}

 echo "</select>";// Closing of list box
 ?>