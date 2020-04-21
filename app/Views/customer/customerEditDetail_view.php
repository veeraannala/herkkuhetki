<div class="mt-3 centerminheight customer row">
  
  <div class="col-md-6">
    <h2>Muuta Tietojasi</h2>
    <div class="row">
    <?=\Config\Services::validation()->listErrors(); ?>
  </div>
    <hr>
    <form action="<?= site_url('customer/customerDetailUpdate')?>" method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="firstname">Etunimi<span class="required">*</span></label>
          <input type="text" class="form-control" name="firstname" placeholder="Etunimi" value="<?=$userdata['firstname']?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="lastname">Sukunimi<span class="required">*</span></label>
          <input type="text" class="form-control" name="lastname" placeholder="Sukunimi" value="<?=$userdata['lastname']?>" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="address">Osoite<span class="required">*</span></label>
          <input type="text" class="form-control" name="address" placeholder="Osoite" value="<?=$userdata['address']?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="postcode">Postinumero<span class="required">*</span></label>
          <input type="text" class="form-control" name="postcode" placeholder="Postinumero" value="<?=$userdata['postcode']?>" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="town">Postitoimipaikka<span class="required">*</span></label>
          <input type="text" class="form-control" name="town" placeholder="Postitoimipaikka" value="<?=$userdata['town']?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="phone">Puhelin</label>
          <input type="text" class="form-control" name="phone" placeholder="Puhelinnumero" value="<?=$userdata['phone']?>">
        </div>
      </div>
      <button type="submit" class="btn btn mb-2">Vahvista</button>
    </form>
    <form method="post" action="<?= site_url('/customer/customerEdit/')?>">
        <button class="btn back-button2 btn-danger">Takaisin</button>
        </form>
    <div class="row">
    </div>
  </div>
</div>