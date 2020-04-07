<div class="cartminheight">
<?php
if(is_array($purchases) && count($purchases)>0)
{
    print_r($_SESSION['basket'])
?>
    <h3 class="pt-4">Ostoskori</h3>
    <?php echo '<a href="' . site_url('cart/clear') . '"> Tyhjennä</a>'; ?>
    <div class="row mb-3">
    <?php
    foreach ($products as $product):
        ?>
        <div class="col-md-3 mt-3">
        <div>
            <img class="img-fluid cart-image" src="<?=base_url($product['image'] . '.png')?>">
            <p style="margin-bottom: 0rem">Nimi: <?= $product['name'] ?></p>
            <p style="margin-bottom: 0rem">Hinta: <?= $product['price'] ?>€</p>
            <button class="btn delete mt-1">Poista</button>
        </div>
        </div>
       <?php endforeach;?>
<?php
}else{ ?>
    <?php echo '<div class="mt-3"><p style="margin-bottom: 0 !important">Ostoskorisi on tyhjä jatka ostoksille <a href="' . site_url('') . '">tästä<a/></p></div>';
}
?>
</div>
<div class="row">
        <div class="col-12">
        <h3>Yhteensä</h3>
        </div>
       </div>
</div>