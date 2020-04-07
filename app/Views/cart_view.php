<div class="cartminheight">
    <?php
if(is_array($basketproducts))
{
?>
    <h3 class="pt-4">Ostoskori</h3>
    <?php echo '<a href="' . site_url('cart/clear') . '"> Tyhjennä</a>'; ?>
    <div class="row mb-3">
        <?php
    $total_sum = 0;
    foreach ($basketproducts as $product):
        ?>
        <div class="col-md-3 mt-3 cart-card">
            <form class="form-group mb-0" method="post" action="<?= site_url('cart/updateAmount/' . $product['id'])?>">

                <img class="img-fluid" src="<?=base_url($product['image'] . '.png')?>">
                <p style="margin-bottom: 0rem;">Nimi: <?= $product['name'] ?></p>
                <p><?php
            $amount = 0;
            foreach ($_SESSION['basket'] as $key => $value):
                if ($value == $product['id'])
                    $amount++;
            endforeach;
            $total_sum += $amount * $product['price'];
            print 'Määrä: ' . $amount . ' x ' .  $product['type'] . '<br>';
            print 'Hinta: ' . $amount * $product['price'] . '€' ;
            ?></p>

                <div class="form-row">
                    <div class="col">
                        <label for="updAmount">Muuta määrää:</label>
                    </div>
                    <div class="col">
                        <input class="form-control" id="updAmount" name="updAmount" type="number" step="1" value="0"
                            min="-<?= $amount?>" max="<?=$product['stock']-$amount?>">
                    </div>
                    <div class="col">
                        <button class="btn mt-1 float-right">Päivitä</button>
                    </div>
                </div>

            </form>
            <form class="form-group mt-0" method="post" action="<?= site_url('cart/delete/' . $product['id'])?>">
                <div class="float-right"><button class="btn">Poista</button>
                </div>
            </form>

        </div>
        <?php endforeach;?>
    </div>
    <div class="row total_sum">
        <div class="col-12">
            <h3>Yhteensä: <?= $total_sum?>€<button class="btn btn-order">Tilaa</button></h3>
        </div>
    </div>
    <?php
}else{ ?>
    <?php echo '<div class="mt-3"><p style="margin-bottom: 0 !important">Ostoskorisi on tyhjä jatka ostoksille <a href="' . site_url('') . '">tästä<a/></p></div>';
}
?>
</div>