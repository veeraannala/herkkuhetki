<a href="<?= site_url('cart/clear')?>">Tyhjennä</a>

<?php 
if(is_array($purchases) && count($purchases)>0)
{
?>
    <?php foreach ($purchases as $purchase): ?>
        <p><?= $purchase?></p>
       <?php endforeach;?>
<?php
}else{
   echo "empty";
}
?>