<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="<?= base_url('/css/herkkukauppa.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('/css/navigation.css'); ?>">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <title></title>
</head>

<body>
<div class="container">
<div class="row">
    <div class="col-md-3 d-flex justify-content-center">
      <a href="<?php echo base_url()?>"><img src="/../images/logo.png" alt="logo"></a>
    </div>
    <div class="col-md-9 text-center align-self-center d-none d-sm-block">
      <h2 class="mainheader">Tervetuloa herkkujen maailmaan!</h2>
    </div>
    
</div>
</div>
    <div class="container navv">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Irtokarkit
              </a>
              <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item "href="#">Salmiakit</a>
                <a class="dropdown-item" href="#">Kirpeät karkit</a>
                <a class="dropdown-item" href="#">Kovat karkit</a>
                <a class="dropdown-item" href="#">Lakritsit</a>
                <a class="dropdown-item" href="#">Vaahtokarkit</a>
                <a class="dropdown-item" href="#">Toffeet</a>
                <a class="dropdown-item" href="#">Viinikumit</a>
                <a class="dropdown-item" href="#">Suklaat</a>

              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Pakatut makeiset
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Karkkipussit</a>
                <a class="dropdown-item" href="#">Karkkilaatikot</a>
                <a class="dropdown-item" href="#">Lakupatukat</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Suklaat
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Suklaalevyt</a>
                <a class="dropdown-item" href="#">Suklaapatukat</a>
                <a class="dropdown-item" href="#">Suklaamunat</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Teemakarkit
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Joulu</a>
                <a class="dropdown-item" href="#">Pääsiäinen</a>
                <a class="dropdown-item" href="#">Halloweenkarkit</a>
                <a class="dropdown-item" href="#">Ystävänpäivä</a>
              </div>
          </li>
          </ul>
          <form action="" class="form-inline">
            <div class="input-group search mr-2">
              <input type="text" class="form-control" placeholder="Etsi tuotteita" aria-label="etsi"
                aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-outline-danger" type="button"><i class="fa fa-search"
                    aria-hidden="true"></i></button>
              </div>
            </div>
          </form>
          <div class="nav-item">
          <a class="mr-2" href="#">Kirjaudu</a><i class="fa fa-2x fa-user mr-2" aria-hidden="true"></i>
          </div>
          <?php
          if (isset($_SESSION['basket'])) {
            echo '<div><a href="' . site_url('cart/index') . '">' . count($_SESSION['basket']) . '<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i><a/></div>';
          }
          else {
            echo '<div><a href="' . site_url('cart/index') . '"><i class="fa fa-2x fa-shopping-cart" aria-hidden="true"></i><a/></div>';
          }
          ?>

        </div>
      </nav>
    </div>
    <div class="container">