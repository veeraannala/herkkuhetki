<div class="row">

    <div class="col-12 col-lg-9">
        <div class="row">
         <?php foreach ($product as $prod): ?>
            <div class="col-sm-12 col-lg-6 p-3">
                <img class="img-fluid" src="<?=base_url($prod['image'] . '.png')?>">
            </div>
            <div class="col-sm-12 col-lg-6 p-3">
           
        
            <h2 class="mb-3"><?= $prod['name'] ?></h2>
                
                <p>Tuote on valitettavasti loppunut.</p>
                
            </div>
        </div>
        

        <div class="row">
            <div class="col-12 col-lg-9 p-3">
                <?= $prod['description'] ?>

        <!-- Review form -->      
        <div class="col-12 p-5">
            <h3 class="mb-3">Arvostelut</h3>
        <form class="form-group" method="post" action="<?= site_url('shop/review/' . $prod['id'])?>">
            <h5 class="mt-4">Arvosteltava tuote: <?= $prod['name'] ?></h5>
            <label class="mt-2" for="stars"><i class="fa fa-star-o" aria-hidden="true"></i> Tähdet:</label>
            <input class="mt-2 mr-2" type="number" name="stars" id="stars" min="0" max="5"></input>
            
            <br><label class="mt-2" for="review">Kommentti:</label></br>
            <textarea class="form-control" rows="5" cols="1" id="review" name="review"></textarea>
            <input type="hidden" value="<?= $prod['id'] ?>" name="id" id="id">
            <button class="btn mt-3">Lähetä</button>
        </form>
        </div>

                <?php endforeach; ?>
                
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3">
        <div class="row">
            <div class="col-12 p-3">
            <i class="fa-lg fa fa fa-clock-o icon-color" aria-hidden="true"></i>
            <p>Toimitamme tilauksesi viimeistään 2 viikon kuluttua</p>
            <i class="fa-lg fa fa-archive icon-color" aria-hidden="true"></i>
            <p>Voit valita toimitustavan useista eri vaihtoehdoista</p>
            <i class="fa-lg fa fa-credit-card icon-color" aria-hidden="true"></i>
            <p>Toimitusten hinnat 5€-20€ toimitustavasta riippuen</p>
            <i class="fa-lg fa fa-truck icon-color" aria-hidden="true"></i>
            <p>Yli 70€ tilaukset postitamme ilmaiseksi</p>
            <p>Yli 120€ tilaukset ilmaiseksi suoraan kotiovellesi</p>
            <i class="fa-lg fa fa-heart icon-color" aria-hidden="true"></i>
            <p>100% laatua</p>
            </div>
        </div>
    </div>
    </div>