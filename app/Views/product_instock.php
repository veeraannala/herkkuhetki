<div class="row">

    <div class="col-12 col-lg-9">
        <div class="row">
        <?php $prodID = 0; ?>
         <?php foreach ($product as $prod): ?>
            <div class="col-sm-12 col-lg-6 p-3">
                <img class="img-fluid" src="<?=base_url($prod['image'])?>">
            </div>

            
            <div class="col-sm-12 col-lg-6 p-3">
            <h2 class="mb-3"><?= $prod['name'] ?></h2>
                <p>Varastossa <?=$prod['stock'] ?> kpl</p>
                <form class="form-group" method="post" action="<?= site_url('cart/insert')?>">
                    <label for="amount">Määrä:</label>
                    <input type="hidden" name="product" value="<?= $prod['price'] ?>">
                    <input class="form-control mb-3" id="amount" name="amount" type="number" step="1" value="1" min="1" max="<?= $prod['stock'] ?>">
                    <h5>Hinta <?= $prod['price'] ?> €</h5>
                    <input type="hidden" name="product" value="<?= $prod['id'] ?>">
                    <button class="btn">Lisää ostoskoriin</button>
                </form>
            </div>
        </div>
        <?php $prodID = $prod['id']; ?>

        <div class="row">
            <div class="col-12 col-lg-9 p-3">
                <?= $prod['description'] ?>

        <!-- review form -->        
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
                <!-- Prints 3 reviews -->
                <h3>Arvostelut</h3>
                <?php $i = 0; foreach ($review as $re):{
                    $i++; if ($i > 3) {
                    break;        }  } 
                ?>
                <form class="form-group" method="post" action="<?= site_url('shop/showReview/' . $re['product_id'])?>">
            <div>
                    <tr>
                    <th><?= date_format (new DateTime($re['reviewDate']), 'd/m/Y');?></th>
                    <th><?=$re['review']?></th>
                    <th><?= $re['stars']?><i class="fa fa-star" aria-hidden="true"></i></th>
                    </tr>

            </div>
                <?php endforeach; ?>
                <button class="btn mt-3">Kaikki Arvostelut</button>
                </form>
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