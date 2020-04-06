<div class="cartminheight">
<?php
$finalprice = 0;
if(is_array($purchases) && count($purchases)>0)
{
    print_r($_SESSION['basket'])
?>
    <h3 class="pt-4">Ostoskori</h3>
    <?php echo '<a href="' . site_url('cart/clear') . '"> Tyhjennä</a>'; ?>
    <div class="row mb-3">
    <?php foreach ($purchases as $purchase):
        $finalprice = array_sum($purchases) ?>
            <div class="col-md-3 col-sm-4 mt-3">
        <div class=""><p class="mt-2" style="margin-bottom: 0 !important; width:100px;">Nimi: <br>Hinta: <?= $purchase?>€<button class="btn delete mt-1">Poista</button></p></div>
        </div>
       <?php endforeach;?>
       <p class="result ml-3 mt-3">Yhteensä: <?php print $finalprice; ?>€</p>
<?php
}else{ ?>
    <h3 class="pt-4">Ostoskori</h3>
    <?php echo '<div class="mt-3"><p style="margin-bottom: 0 !important">Ostoskorisi on tyhjä jatka ostoksille <a href="' . site_url('') . '">tästä<a/></p></div>';
}
?>
</div>
</div>