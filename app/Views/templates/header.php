<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/css/herkkukauppa.css'); ?>">
    <title></title>
  </head>
  <body>
  <div class="container">
  <div class="row">
      <div class="col-md-4 text-center">
        <img src="/../images/logo.png" alt="logo">
      </div>
      <div class="col-md-4 d-flex justify-content-center">
        <form action="">
        <div class="input-group md-form form-sm form-2 pl-0">
  <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search" aria-label="Search">
  <div class="input-group-append">
    <span class="input-group-text red lighten-3" id="basic-text1"><i class="fas fa-search text-grey"
        aria-hidden="true"></i></span>
  </div>
</div>
        </form>
      </div>
      <div class="col-md-4 text-center">
      <p href="">jotain</p>
      <p href="">jotain</p>
      </div>
  </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Irtokarkit
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Salmiakit</a>
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pakatut makeiset
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Karkkipussit</a>
                  <a class="dropdown-item" href="#">Karkkilaatikot</a>
                  <a class="dropdown-item" href="#">Lakupatukat</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Suklaat
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Suklaalevyt</a>
                  <a class="dropdown-item" href="#">Suklaapatukat</a> 
                  <a class="dropdown-item" href="#">Suklaamunat</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <?php echo '<div><a href="' . site_url('cart/index') . '">Ostoskori<a/></div>' ?>
             
          </div>
      </nav>

      <div class="container">

   