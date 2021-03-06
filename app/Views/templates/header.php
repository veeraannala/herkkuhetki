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
    <title><?= $title ?></title>
</head>

<body>
    <div class="container header">
        <div class="row">
            <div class="col-md-3 d-flex justify-content-center">
                <a href="<?php echo base_url()?>"><img src="/../images/logo.png" alt="logo" draggable="false"></a>
            </div>
            <div class="col-md-9 text-center align-self-center d-none d-sm-block">
                <h2 class="mainheader">Tervetuloa herkkujen maailmaan!</h2>
            </div>
            <div class="container navv">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">

                            <?php foreach ($categories as $category):
                        if ($category['parentID'] === null) {
                            ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?=$category['name']?>

                                </a>
                                <div class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php foreach ($categories as $subcategory):

                              if ($subcategory['parentID'] === $category['categoryID']) {
                                  ?>
                                    <a class="dropdown-item"
                                        href="<?=site_url('category/index/' . $subcategory['categoryID'])?>"><?=$subcategory['name']?></a>
                                    <?php
                              } ?>

                                    <?php endforeach; ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"
                                        href="<?= site_url('category/allProducts/' . $category['categoryID']) ?>"><?=$category['name']?></a>
                                </div>
                            </li>
                            <?php }
                        endforeach; ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    TEEMAKARKIT
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <?php foreach ($themecategories as $themes): ?>
                                    <a class="dropdown-item"
                                        href=<?=site_url('category/index/' . $themes['id'])?>><?=$themes['name']?></a>

                                    <?php endforeach; ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"
                                        href="<?= site_url('category/allThemeProducts/') ?>">Teemakarkit</a>



                                </div>
                            </li>
                        </ul>
                        <form action="/shop/search_product" class="form-inline" method="get">
                            <div class="input-group search mr-2">
                                <input type="text" class="form-control" name="search" value="" minlength="4"
                                    placeholder="Etsi tuotteita" aria-label="etsi" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-danger"><i class="fa fa-search"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </form>
                        <?php if(!empty($_SESSION['customer'])) { ?>
                        <div class="nav-item">
                            <a href="<?php echo base_url('customer/customerAccount')?>"><i class="fa fa-2x fa-user mr-2"
                                    aria-hidden="true"></i></a>
                            <a href="<?php echo base_url('customer/logout')?>">KIRJAUDU ULOS</a>
                        </div>
                        <?php
                }
                else {
                ?>
                        <div class="nav-item">
                            <a href="<?php echo base_url('customer/index')?>"><i class="fa fa-2x fa-user mr-2"
                                    aria-hidden="true"></i></a>
                            <a href="<?php echo base_url('customer/index')?>">KIRJAUDU</a>
                        </div>
                        <?php
                }
                ?>
                        <?php
          if (isset($_SESSION['basket'])) {
            echo '<div><a href="' . site_url('cart/index') . '">' . '<i class="fa mr-1 fa-shopping-cart fa-2x" aria-hidden="true"></i>' . count($_SESSION['basket']) . '</a></div>';
          }
          else {
            echo '<div><a href="' . site_url('cart/index') . '"><i class="fa fa-2x fa-shopping-cart" aria-hidden="true"></i></a></div>';
          }
          ?>

                    </div>
                </nav>
            </div>
            </nav>
        </div>
    </div>

    <div class="container minheight">