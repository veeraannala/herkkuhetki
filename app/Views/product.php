
<div class="row">
<?php
  $i = 0;
  shuffle($product);
  foreach ($product as $prod):{
  $i++;
  if ($i > 8) {
  break;       
}
} 
?>
    <div class="col-lg-3 col-md-4 card mt-3 mb-1">
      <a href="<?=site_url('shop/show_product/' . $prod['id'])?>" ><img class="img-fluid" src="<?=base_url($prod['image'] . '.png')?>">
    <div class="card-body text-center">
      <h5 class="card-title"><?= $prod['name'] ?></h5>
      <p class="card-text"><?= $prod['price'] . '€/100G' ?></p></a>
      <form method="post" action="<?= site_url('cart/insert')?>">
      <input type="hidden" name="product" value="<?= $prod['price'] ?>">
      <button class="btn mt-2">Lisää ostoskoriin</button>
      </form>
    </div>
  </div>
  <?php endforeach; ?>
</div>