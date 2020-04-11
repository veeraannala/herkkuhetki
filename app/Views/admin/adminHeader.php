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
<div class="container header">
<div class="row">
    <div class="col-md-3 d-flex justify-content-center">
      <a href="<?php echo base_url()?>"><img src="/../images/logo.png" alt="logo"></a>
    </div>
    <div class="col-md-9 text-center align-self-center d-none d-sm-block">
      <h2 class="mainheader">Herkkuhetken hallinnointi</h2>
    </div>
    <div class="container navv">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?=site_url('admin/updateCategory/')?>">Muokkaa tuoteryhmiä</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('admin/updateProduct/')?>">Lisää tuotteita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('admin/editProduct/')?>">Muokkaa tuotteita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=site_url('admin/editAmount/')?>">Varastosaldot</a>
                    </li>


            </div>
             <?php if(isset($_SESSION['username'])) { ?>
                 <div class="nav-item">
                 <a href="<?php echo base_url('admin/logout')?>"><i class="fa fa-2x fa-user mr-2" aria-hidden="true"></i>Kirjaudu ulos</a>
            </div>
         <?php
         }
         else {
         ?>
        <a href="<?php echo base_url('admin/adminlogin')?>"><i class="fa fa-2x fa-user mr-2" aria-hidden="true"></i>Kirjaudu</a>
        <?php  
         }
         ?>
        </nav>
    </div>
    <div class="container">