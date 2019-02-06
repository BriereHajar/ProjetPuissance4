<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" type="text/css" href="public/css/style.css" title="Normal" />
    <title>Puissance 4</title>
    <style>
    body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
    body {font-size:16px;}
    .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
    .w3-half img:hover{opacity:1}
    </style>
</head>
<body>

<!-- Puissance 4 -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>P</b><br><b>U</b><br><b>I</b><br><b>S</b><br><b>S</b><br><b>A</b><br><b>N</b><br><b>C</b><br><b>E</b><br><b>4</b><br></h3>
  </div>
</nav>

  <!-- Jouer contre joueur -->
  <div class="w3-container" id="contact" style="margin-left:390px" >
    <h1 class="w3-xxxlarge w3-text-red"><b>Jouer contre joueur :</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
   <form action="index.php?url=player" method="post">
        Nom du joueur 1 :<input type="text" name="nomj1" value="<?php
        if (isset($_COOKIE['nomj1']))
            echo $_COOKIE['nomj1'];
        ?>" required/><br />
        Nom du joueur 2 :<input type="text" name="nomj2" value="<?php
        if (isset($_COOKIE['nomj2']))
            echo $_COOKIE['nomj2'];
        ?>" required/><br />
        <input type="submit" name="nomJoueur" value="Commencer" />
    </form>
   </div>

<br/>

  <!-- Jouer contre l'ordinateur -->
  <div class="w3-container" id="contact" style="margin-left:390px" >
    <h1 class="w3-xxxlarge w3-text-red"><b>Jouer contre l'ordinateur :</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
    <form action="index.php?url=machine" method="post">
        Nom du joueur 1 :<input type="text" name="nomj1" value="<?php
        if (isset($_COOKIE['nomj1']))
            echo $_COOKIE['nomj1'];
        ?>" required/><br />
        <input type="submit" name="nomJoueur" value="Commencer" />
    </form>
   </div>
</body>
</html>
