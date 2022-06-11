<?php

$this->title = 'Pronuntia';
?>

<!--
    .container {
    height: 70px;
    position: relative;
    }

-->


<style>

    .col-3 {
    -moz-hyphens:auto;
    -ms-hyphens:auto;
    -webkit-hyphens:auto;
    hyphens:auto;
    word-wrap:break-word;
    margin: 16px 16px;
    }

    .logbtn{  
        border-radius: 8px;
    border: 3px solid black; 
    text-align: center;
    background-color: teal;  

    }

    .btn {
    border-radius: 8px;
    border: 2px solid black; 
    color: black;
    text-align: center;
    font-size: 18px;
    margin: 8px 8px;
    height:60px;
    width:240px;
    }

    hr.solid{
        border-top: 3px solid #bbb;
    }

</style>


<div class="site-index">
    <div class="jumbotron bg-transparent">   
    <h1>  <p style = "font-family:georgia,garamond,serif;font-size:55px;font-style:italic;">
        <strong>Pronuntia</strong></h1>
      </p>
        <p class="lead">descrizione</p>
    <hr class="solid">
        <div class="row justify-content-md-center ">

<div class="col-3">
    <h1>Area Caregiver</h1>
    <p>entra nell'area del caregiver
        </p>
    <form action="">
    <button class="btn btn-lg btn-primary" type="submit">  <strong>Log in Caregiver</strong></button></form>
</div>

<div class="col-3">
    <h1>Area Logopedista</h1>
    <p>entra nell'area del logopedista
        </p>
    <form action="/site/login">
    <button class="btn btn-lg btn-primary" type="submit">  <strong>Log in Logopedista</strong></button></form>
</div>

    </div>
    <hr class="solid">
    <div class="container">

        </div>
        <h2>Blocco test</h2>
            <p>Link per il test autodiagnostico <a href="link">link</a></p>
            <p><small>il test non si sostitusice alla diagnosi</small>
            </p>         


</div>


