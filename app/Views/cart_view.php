<a href="<?= site_url('cart/clear')?>">Tyhjennä</a>
<?php foreach ($purchases as $purchase): ?>
    <p><?= $purchase?></p>
<?php endforeach;?>