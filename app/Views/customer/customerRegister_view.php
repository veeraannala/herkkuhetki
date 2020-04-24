<div class="centerminheight customer">
  <?php $validation =  \Config\Services::validation();?>
  <div class="row col">
    <?=\Config\Services::validation()->listErrors(); ?>
  </div>
  <form action="<?= site_url('customer/customerRegistration/')?>" method="post">
    <div class="pt-3 form-row">
        <div class="form-group col-sm-6 col-lg-3">
          <label for="email">Sähköposti<span class="required">*</span></label>
          <input type="email" class="form-control <?php if ($validation->hasError('email')||isset($ordererror)) echo 'inputerror'?>"
          name="email" placeholder="Sähköposti" value="<?php if(isset($_POST["email"])) echo $_POST["email"]; ?>" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-sm-6 col-lg-3">
          <label for="password">Salasana<span class="required">*</span></label>
          <input type="password" class="form-control <?php if ($validation->hasError('password','passconfirm')) echo 'inputerror'?>"
           name="password" placeholder="Salasana" required>
        </div>
        <div class="form-group col-sm-6 col-lg-3">
          <label for="inputPassword4">Vahvista salasana<span class="required">*</span></label>
          <input type="password" class="form-control <?php if ($validation->hasError('password','passconfirm')) echo 'inputerror'?>"
           name="passconfirm" placeholder="Vahvista salasana" required>
        </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-6 col-lg-3">
        <label for="firstname">Etunimi<span class="required">*</span></label>
        <input type="text" class="form-control <?php if ($validation->hasError('firstname')) echo 'inputerror'?>"
         name="firstname" placeholder="Etunimi" value="<?php if(isset($_POST["firstname"])) echo $_POST["firstname"]; ?>" required>
      </div>
      <div class="form-group col-sm-6 col-lg-3">
        <label for="lastname">Sukunimi<span class="required">*</span></label>
        <input type="text" class="form-control <?php if ($validation->hasError('lastname')) echo 'inputerror'?>"
         name="lastname" placeholder="Sukunimi" value="<?php if(isset($_POST["lastname"])) echo $_POST["lastname"]; ?>" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-6 col-lg-3">
        <label for="address">Osoite<span class="required">*</span></label>
        <input type="text" class="form-control <?php if ($validation->hasError('address')) echo 'inputerror'?>"
         name="address" placeholder="Osoite" value="<?php if(isset($_POST["address"])) echo $_POST["address"]; ?>" required>
      </div>
      <div class="form-group col-sm-6 col-lg-3">
        <label for="postcode">Postinumero<span class="required">*</span></label>
        <input type="text" class="form-control <?php if ($validation->hasError('postcode')) echo 'inputerror'?>"
         name="postcode" placeholder="Postinumero" maxlength="5" value="<?php if(isset($_POST["postcode"])) echo $_POST["postcode"]; ?>" required>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-sm-6 col-lg-3">
        <label for="town">Postitoimipaikka<span class="required">*</span></label>
        <input type="text" class="form-control <?php if ($validation->hasError('town')) echo 'inputerror'?>"
         name="town" placeholder="Postitoimipaikka" required value="<?php if(isset($_POST["town"])) echo $_POST["town"]; ?>">
      </div>
      <div class="form-group col-sm-6 col-lg-3">
          <label for="phone">Puhelin</label>
          <input type="text" class="form-control <?php if ($validation->hasError('phone')) echo 'inputerror'?>"
           name="phone" placeholder="Puhelinnumero" value="<?php if(isset($_POST["phone"])) echo $_POST["phone"]; ?>">
      </div>
    </div>
    <button type="submit" class="btn btn mb-2">Rekisteröidy</button>
  </form>
    <form method="post" action="<?= site_url('/customer')?>">
      <button class="btn back-button3 btn-danger">Takaisin</button>
    </form>
  <?php
  if (isset($ordererror)) { ?>
    <p class="errormessage"><?=$ordererror?></p>
  <?php
  }
  ?>
</div>
