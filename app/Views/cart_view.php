<a href="<?= site_url('cart/clear')?>">Tyhjennä</a>

<?php 
if(is_array($purchases) && count($purchases)>0)
{
?>
    <?php foreach ($purchases as $purchase): ?>
        <p style="margin-bottom: 0 !important"><?= $purchase?></p>
       <?php endforeach;?>
<?php
}else{
   echo '<div><p style="margin-bottom: 0 !important">Ostoskorisi on tyhjä jatka ostoksille <a href="' . site_url('') . '">tästä<a/></p></div>';
}
?>