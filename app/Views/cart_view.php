<div class="centerminheight">
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
        <div class="col-lg-3 col-md-6 mt-3 cart-card">
            <form class="form-group mb-0" method="post" action="<?= site_url('cart/updateAmount/' . $product['id'])?>">

            <a href="<?=site_url('shop/show_product/' . $product['id'])?>" ><img class="img-fluid" src="<?=base_url($product['image'] . '.png')?>"></a>
                <p style="margin-bottom: 0rem;">Nimi: <?= $product['name'] ?></p>
                <p><?php
      $amount = 0;
      foreach ($_SESSION['basket'] as $key => $value):
          if ($value == $product['id'])
              $amount++;
      endforeach;

            $total_sum += $amount * $product['price'];
            print 'Määrä: ' . $amount . ' x ' .  $product['type'] . '<br>';
            print 'Hinta: ' . number_format($amount * $product['price'],2) . '€' ;
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
    <form action="<?= site_url('cart/placeOrder/')?>" method="post">
    <div class="row total_sum">
        <div class="col-12">
            <h3>Yhteensä: <?php echo number_format($total_sum,2)?>€<button class="btn btn-order">Kassalle</button></h3>
        </div>
    </div>
    <?php
}else{ ?>
    <?php echo '<div class="mt-3"><p style="margin-bottom: 0 !important">Ostoskorisi on tyhjä jatka ostoksille <a href="' . site_url('') . '">tästä<a/></p></div>';
}
?>
</div>