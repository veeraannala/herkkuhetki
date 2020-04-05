
<div class="row">
<?php foreach ($product as $prod): ?>
    <div class="col-lg-3 col-md-4 card mt-3 mb-1">
      <a href="/show_product" ><img class="img-fluid" src="<?=base_url($prod['image'] . '.png')?>"></a>
    <div class="card-body text-center">
      <h5 class="card-title">Ostappa halpoja tikkareita!</h5>
      <p class="card-text">Ostappa halpoja tikkareita!</p>
      <form method="post" action="<?= site_url('cart/insert')?>">
      <input type="hidden" name="product" value="200">
      <button class="btn">Lisää ostoskoriin</button>
      </form>
    </div>
  </div>
  <?php endforeach; ?>
</div>