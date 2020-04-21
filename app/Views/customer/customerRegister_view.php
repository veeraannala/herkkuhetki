<div class="mt-3 centerminheight customer">
    <div>
    <?=\Config\Services::validation()->listErrors(); ?>
    </div>
  <form action="<?= site_url('customer/customerRegistration/')?>" method="post">
    <div class="form-row mt-2">
        <div class="form-group col-sm-6 col-lg-3">
          <label for="email">Sähköposti<span class="required">*</span></label>
          <input type="email" class="form-control" name="email" placeholder="Sähköposti" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-6 col-lg-3">
          <label for="password">Salasana<span class="required">*</span></label>
          <input type="password" class="form-control" name="password" placeholder="Salasana" required>
        </div>
        <div class="form-group col-sm-6 col-lg-3">
          <label for="inputPassword4">Vahvista salasana<span class="required">*</span></label>
          <input type="password" class="form-control" name="passconfirm" placeholder="Vahvista salasana" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-6 col-lg-3">
          <label for="firstname">Etunimi<span class="required">*</span></label>
          <input type="text" class="form-control" name="firstname" placeholder="Etunimi" required>
        </div>
        <div class="form-group col-sm-6 col-lg-3">
          <label for="lastname">Sukunimi<span class="required">*</span></label>
          <input type="text" class="form-control" name="lastname" placeholder="Sukunimi" required>
        </div>
    </div>
    <div class="form-row">
    <div class="form-group col-sm-6 col-lg-3">
          <label for="address">Osoite<span class="required">*</span></label>
          <input type="text" class="form-control" name="address" placeholder="Osoite" required>
      </div>
      <div class="form-group col-sm-6 col-lg-3">
        <label for="postcode">Postinumero<span class="required">*</span></label>
        <input type="text" class="form-control" name="postcode" placeholder="Postinumero" required>
      </div>
    </div>
    <div class="form-row">
    <div class="form-group col-sm-6 col-lg-3">
        <label for="town">Postitoimipaikka<span class="required">*</span></label>
        <input type="text" class="form-control" name="town" placeholder="Postitoimipaikka" required>
      </div>
      <div class="form-group col-sm-6 col-lg-3">
          <label for="phone">Puhelin</label>
          <input type="text" class="form-control" name="phone" placeholder="Puhelinnumero">
      </div>
    </div>
    <button type="submit" class="btn btn mb-2">Rekisteröidy</button>
  </form> 
  <form method="post" action="<?= site_url('/customer')?>">
        <button class="btn back-button3 btn-danger">Takaisin</button>
        </form>
  </form>
  <?php
  if (isset($ordererror)) { ?>
    <p class="errormessage"><?=$ordererror?></p>
  <?php
  } 
  ?> 
</div>

