<div class="cartminheight">
<?php 
if(is_array($purchases) && count($purchases)>0)
{
?>
    <h3 class="pt-4">Ostoskori</h3>
    <?php echo '<a href="' . site_url('cart/clear') . '"> Tyhjennä</a>'; ?>
    <?php foreach ($purchases as $purchase): ?>
        <p class="mt-4" style="margin-bottom: 0 !important"><?= $purchase?></p>
       <?php endforeach;?>
<?php
}else{ ?>
    <h3 class="pt-4">Ostoskori</h3>
    <?php echo '<div class="mt-3"><p style="margin-bottom: 0 !important">Ostoskorisi on tyhjä jatka ostoksille <a href="' . site_url('') . '">tästä<a/></p></div>';
}
?>
</div>