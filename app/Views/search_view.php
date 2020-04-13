<div class="row">
    <div class="form-group col-3 mb-0 mt-2">
      <select id="inputState" class="form-control text-center">
        <option selected>Järjestä</option>
        <option>...</option>
      </select>
    </div>
    <div class="col">
      <?php if (!empty($categoryname)) { ?>
      <p>Tuotteet Kategoriassa:</p>
      <?php } ?>
      <?php foreach ($categoryname as $catname): ?>
      <?php if (isset($categoryname)) { ?>
      <?=$catname->name;?>
      <?php } endforeach; ?>
    </div>
</div>
<div class="row">
    <?php foreach ($searchproduct as $catprod): ?>
        <?php if (isset($searchproduct)) { ?>
        <div class="col-lg-3 col-md-4 card mt-3 mb-1">
          <a href="<?=site_url('shop/show_product/' . $catprod['id'])?>" ><img class="img-fluid" src="<?=base_url($catprod['image'] . '.png')?>">
          <div class="card-body text-center">
            <h5 class="card-title"><?= $catprod['name'] ?></h5>
            <p class="card-text"><?= $catprod['price'] . '€/100G' ?></p></a>
            <form method="post" action="<?= site_url('cart/insert')?>">
            <input type="hidden" name="product" value="<?= $catprod['id'] ?>">
            <button class="btn mt-2">Lisää ostoskoriin</button>
            </form>
          </div>
      </div>
    <?php } endforeach; ?>
</div>

<hr>

<div class="row">
  <div class="col">
    <?php if (!empty($searchresult)) { ?>
          <p>Hakusi:</p>
    <?php } ?>
  </div>
</div>

<div class="row">
    <?php foreach ($searchresult as $prod): ?>
        <?php if (isset($searchresult)) { ?>
        <div class="col-lg-3 col-md-4 card mt-3 mb-1">
          <a href="<?=site_url('shop/show_product/' . $prod['id'])?>" ><img class="img-fluid" src="<?=base_url($prod['image'] . '.png')?>">
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






