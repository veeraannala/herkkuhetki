<div class="row">
<?php foreach ($searchresult as $prod): ?>
    <?php if (is_array($searchresult)) { ?>
    <div class="col-lg-3 col-md-4 col-6 card mt-3 mb-1">
      <a href="<?=site_url('shop/show_product/' . $prod['id'])?>" ><img class="img-fluid" src="<?=base_url($prod['image'])?>">
    <div class="card-body text-center">
      <h5 class="card-title"><?= $prod['name'] ?></h5>
      <p class="card-text"><?= $prod['price'] . '€/100G' ?></p></a>
      <form method="post" action="<?= site_url('cart/insert')?>">
      <input type="hidden" name="product" value="<?= $prod['id'] ?>">
      <button class="btn mt-2">Lisää ostoskoriin</button>
      </form>
    </div>
  </div>
  <?php } endforeach; ?>
</div>