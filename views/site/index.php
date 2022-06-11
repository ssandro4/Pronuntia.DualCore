<?php

$this->title = 'Pronuntia';
?>

<style>

    .container {
    height: 70px;
    position: relative;
    
    }

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
    border: 2px solid black; 
    text-align: center;
    background-color: gray;  

    }

    .btn {
    border-radius: 8px;
    border: 2px solid black; 
    color: black;
    text-align: center;
    font-size: 18px;
    margin: 8px 8px;
    background-color: gray;
    height:70px;
    width:250px;
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
        <p class="lead">descrizione del cazzo blablablablablablablablablablablablablablablablablabla</p>
    <hr class="solid">
        <div class="row justify-content-md-center ">

<div class="col-3">
    <h1>Area Caregiver</h1>
    <p>entra nell'area del caregiver blablablablablablablablablablablablablablablablablabla
        </p>
    <form action="/site/login">
    <button class="btn btn-lg btn-primary" type="submit">  <strong>Log in Caregiver</strong></button></form>
</div>

<div class="col-3">
    <h1>Area Logopedista</h1>
    <p>entra nell'area del logopiedista blablablablablablablablablablablablablablabla
        </p>
    <form action="/site/say">
    <button class="btn btn-lg btn-primary" type="submit">  <strong>Log in Logopedista</strong></button></form>
</div>

    </div>

    <div class="container">

        </div>
        <h2>C'hai un bimbo con problemi?</h2>
            <p>Vai su sto cazzo di  <a href="https://youtu.be/AoOqZJ6CJbg?list=LL&t=4">link</a> e fatti l'autotest</p>
            <p><small>il test potrebbe provocare la morte.</small>
            </p>         
    </div>
    <div class="col-4">
    <h1>AGGIUNGI IL CAREGIVER  </h1>
    <form action="/caregiver/index">
    <button class="btn btn-lg btn-primary" type="submit">  <strong>AGGIUNGILO </strong></button></form>
    </div>

</div>


