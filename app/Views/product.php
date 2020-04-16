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
    <div class="col-lg-3 col-md-4 col-6 card mt-3 mb-1">
        <a href="<?=site_url('shop/show_product/' . $prod['id'])?>"><img class="img-fluid"
                src="<?=base_url($prod['image'] . '.png')?>">
            <div class="card-body text-center">
                <h5 class="card-title"><?= $prod['name'] ?></h5>
                <p class="card-text"><?= $prod['price'] .'€' . ' / ' .  $prod['type'] ?></p>
        </a>
        <form method="post" action="<?= site_url('cart/insert')?>">
            <input type="hidden" name="product" value="<?= $prod['id'] ?>">
            <input type="hidden" name="amount" value="1">
            <?php 
      if (is_array($_SESSION['basket'])) {
          $amount = 0;
          foreach ($_SESSION['basket'] as $key => $value):
          if ($value == $prod['id']) {
              $amount++;
          }
          endforeach;
          if (($prod['stock'] - $amount) < 1) {?>
            <button class="btn mt-2" disabled>Ei varastossa</button>
          <?php } 
          else {?>
            <button class="btn mt-2">Lisää ostoskoriin</button>
          <?php
           }
      }
      else if ($prod['stock'] < 1){ ?>
          <button class="btn mt-2" disabled>Ei varastossa</button>
<?php
      } else {?>
            <button class="btn mt-2">Lisää ostoskoriin</button>
 <?php
      }?>
        </form>
    </div>
  </div>
<?php endforeach; ?>
</div>