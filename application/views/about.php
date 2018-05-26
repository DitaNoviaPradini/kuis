<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Pemrograman Web Berbasis Framework</title>

<link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Web Framework</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('index.php')?>">Beranda</a></li>
        <li class="active"><a href="#">Tentang Saya</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Submenu 1</a></li>
            <li><a href="#">Submenu 2</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="jumbotron">
    <h1>About</h1>
   <p>
      NIM &nbsp : &nbsp 1641720054
      <br>
      Nama &nbsp : &nbsp Putri Indah Mawarni
      <br>
      Gender &nbsp : &nbsp Female
      <br>
      Hobi &nbsp : &nbsp Dance and Play Game
    
    </p>
  </div>
</div>

<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

</body>
</html>