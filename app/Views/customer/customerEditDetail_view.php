<div class="centerminheight customer row">
  <?php $validation =  \Config\Services::validation();?>
  <div class="col-md-6">
    <h2 class="pt-3">Muuta tietojasi</h2>
    <div class="row pt-2">
      <?=\Config\Services::validation()->listErrors(); ?>
    </div>
    <hr>
    <form action="<?= site_url('customer/customerDetailUpdate')?>" method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="firstname">Etunimi<span class="required">*</span></label>
          <input type="text" class="form-control <?php if ($validation->hasError('firstname')) echo 'inputerror'?>"
          name="firstname" placeholder="Etunimi" value="<?=$userdata['firstname']?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="lastname">Sukunimi<span class="required">*</span></label>
          <input type="text" class="form-control <?php if ($validation->hasError('lastname')) echo 'inputerror'?>"
          name="lastname" placeholder="Sukunimi" value="<?=$userdata['lastname']?>" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="address">Osoite<span class="required">*</span></label>
          <input type="text" class="form-control <?php if ($validation->hasError('address')) echo 'inputerror'?>"
          name="address" placeholder="Osoite" value="<?=$userdata['address']?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="postcode">Postinumero<span class="required">*</span></label>
          <input type="text" class="form-control <?php if ($validation->hasError('postcode')) echo 'inputerror'?>"
          name="postcode" placeholder="Postinumero" maxlength="5" value="<?=$userdata['postcode']?>" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="town">Postitoimipaikka<span class="required">*</span></label>
          <input type="text" class="form-control <?php if ($validation->hasError('town')) echo 'inputerror'?>"
          name="town" placeholder="Postitoimipaikka" value="<?=$userdata['town']?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="phone">Puhelin</label>
          <input type="text" class="form-control <?php if ($validation->hasError('phone')) echo 'inputerror'?>"
          name="phone" placeholder="Puhelinnumero" value="<?=$userdata['phone']?>">
        </div>
      </div>
      <button type="submit" class="btn btn mb-2">Vahvista</button>
    </form>
    <form method="post" action="<?= site_url('/customer/customerEdit/')?>">
      <button class="btn back-button2 btn-danger">Takaisin</button>
    </form>
  </div>
</div>
