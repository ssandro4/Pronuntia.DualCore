<?php

use yii\helpers\Html;
/* @var $this yii\web\View */

?>

<style>
.wrapper {
    text-align: center;
}
.text {
    text-align: center;   
    margin: 0 auto;
  margin-left: auto;
  margin-right: auto;
  width:200px;
}
.button {
    border-radius: 8px;
    border: 2px solid black; 
    color: black;
    text-align: center;
    font-size: 18px;
    margin: 8px 8px;
    height:60px;
    width:240px;
    }
</style>


<h1><?= Html::encode($this->title) ?></h1>
<p>

    <div class="wrapper">
    <h1>Test TVL</h1>

    <div class="text">Al seguente link puoi scaricare il Test di Valutazione del Linguaggio (TVL) pensato per bambini tra i 30 e i 71 mesi:
    </div>
  
    <form action="download">
    <button class="button" type="submit">DOWNLOAD</button>
    </form>
    </div>

</p>