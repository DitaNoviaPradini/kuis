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
        <li class="active"><a href="#">Beranda</a></li>
        <li><a href="<?php echo site_url('welcome/about')?>">Tentang Saya</a></li>
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
    <h1>Hello CodeIgniter + Bootstrap</h1>
    <p>
      Consectetur unde eius ducimus esse obcaecati perferendis, ad
      veritatis quo, nostrum! Dolor consequuntur assumenda quisquam eos
      repellat Magni voluptates sed neque odio officiis? Laborum aliquid
      obcaecati eaque sint error Nam.
    </p>
    <p>
      <a class="btn btn-lg btn-primary"
        href="http://getbootstrap.com/docs/3.3/" role="button">
        Lihat Dokumentasi Bootstrap 3 &raquo;
      </a>
    </p>
  </div>
</div>

<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>

</body>
</html>