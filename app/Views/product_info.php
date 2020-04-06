<div class="row">

    <div class="col-12 col-lg-9">
        <div class="row">
         <?php foreach ($product as $prod): ?>
            <div class="col-sm-12 col-lg-6 p-3">
                <img class="img-fluid" src="<?=base_url($prod['image'] . '.png')?>">
            </div>
            <div class="col-sm-12 col-lg-6 p-3">
           
        
            <h2 class="mb-3"><?= $prod['name'] ?></h2>
                <?php
                if ($prod['stock'] > 0) {
                    ?>
                <p>Varastossa <?=$prod['stock'] ?> kpl</p>
                <?php
                } else {?>
                <p>Ei varastossa :(</p> 
                <?php } ?>
                <form class="form-group" method="post" action="<?= site_url('cart/insert')?>">
                    <label for="amount">Määrä:</label>
                    <input type="hidden" name="product" value="200">
                    <input class="form-control mb-3" id="amount" name="amount" type="number" step="1" value="1" min="1" max="<?= $prod['stock'] ?>">
                    <h5>Hinta <?= $prod['price'] ?> €</h5>
                    <button class="btn">Lisää ostoskoriin</button>
                </form>
            </div>
        </div>
        

        <div class="row">
            <div class="col-12 col-lg-9 p-3">
                <?= $prod['description'] ?>
                
                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="row">
            <div class="col-12 p-3">
                <p>Voit valita toimitustavan useista eri vaihtoehdoista: nouto, toimitus lähimpään postin toimituspaikkaan, kotiinkuljetus, postipaketti automaatti.</p>
                <p>Tilausten toimitusten hinnat vaihtelevat välillä 5€-20€ toimitustavasta riippuen.</p>
                <p>Yli 70€ tilaukset toimitetaan ilmaiseksi lähimpään postin toimituspaikkaan ja yli 120€ tilaukset toimitetaan ilmaiseksi suoraan kotiovellesi.</p>
            </div>
        </div>
    </div>
    </div>