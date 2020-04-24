<div class="pt-3 centerminheight customer row">
<?php $validation =  \Config\Services::validation();?>
  <div class="col-md-6">
    <h2>Muuta sähköpostiosoitettasi</h2>
    <hr>
      <div class="row col-12">
        <?php if(isset($emailmessage)) { ?>
            <?='<h3 class="errormessage">'.$emailmessage.'</h3>';?>
        <?php } ?>
        <?php
        if (isset($ordererror)) { ?>
        <p class="errormessage"><?=$ordererror?></p>
        <?php
        }
        ?>
      </div>
      <?php if(isset($_POST["newemail"]) ||isset($_POST["emailconfirm"])) {?>
      <div>
          <?=\Config\Services::validation()->listErrors(); ?>
      </div>
      <?php } ?>
          <form action="<?= site_url('customer/customerEmailUpdate')?>" method="post">
            <div class="row mt-2">
              <div class="col-md-8">
                  <p class="customer">Nykyinen sähköpostiosoitteesi on: <?=$userdata['email']?></p>
              </div>
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-8">
                    <label for="email">Uusi sähköposti<span class="required">*</span></label>
                    <input type="email" class="form-control <?php if ($validation->hasError('newemail')||$validation->hasError('emailconfirm')||
                    isset($ordererror)||isset($emailmessage)) echo 'inputerror'?>" name="newemail" placeholder="Sähköposti" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="email">Vahvista uusi sähköposti<span class="required">*</span></label>
                    <input type="email" class="form-control <?php if ($validation->hasError('newemail')||$validation->hasError('emailconfirm')||
                    isset($ordererror)||isset($emailmessage)) echo 'inputerror'?>" name="emailconfirm" placeholder="Vahvista sähköposti" required>
                </div>
            </div>
            <button type="submit" class="btn btn mb-2">Vahvista</button>
          </form>
      <div class="row">
        <div class="col-md-6">
          <?= anchor('customer/customerEditDetail','Muuta muita tietojasi') ?>
        </div>
      </div>
  </div>
    <div class="col-md-6">
      <h2>Muuta salasanaasi</h2>
        <hr>
        <?php if(isset($_POST["newpassword"])||isset($_POST["passconfirm"])) {?>
        <div>
            <?=\Config\Services::validation()->listErrors(); ?>
        </div>
        <?php } ?>
        <div class="row col-12">
          <?php if(isset($message)) { ?>
            <?='<h3 class="errormessage">'.$message.'</h3>';?>
          <?php } ?>
        </div>
        <form action="<?= site_url('customer/customerPasswordUpdate')?>" method="post">
          <div class="form-row">
              <div class="form-group col-md-8 ">
                <label for="password">Vanha salasana<span class="required">*</span></label>
                <input type="password" class="form-control <?php if(isset($message)) echo 'inputerror'?>" name="oldpassword" placeholder="Salasana" required>
              </div>
              <div class="form-group col-md-8">
                <label for="password">Uusi salasana<span class="required">*</span></label>
                <input type="password" class="form-control <?php if ($validation->hasError('newpassword')||$validation->hasError('passconfirm')
                ||isset($message)) echo 'inputerror'?>" name="newpassword" placeholder=" Uusi salasana" required>
              </div>
              <div class="form-group col-md-8">
                <label for="inputPassword4">Vahvista uusi salasana<span class="required">*</span></label>
                <input type="password" class="form-control <?php if ($validation->hasError('newpassword')||$validation->hasError('passconfirm')
                ||isset($message)) echo 'inputerror'?>" name="passconfirm" placeholder="Vahvista salasana" required>
              </div>
          </div>
            <button type="submit" class="btn btn mb-2">Vahvista</button>
        </form>
        <form style="display: block;" method="post" action="<?= site_url('/Customer/customerAccount/')?>">
          <button class="btn back-button1 btn-danger">Takaisin</button>
        </form>
    </div>
</div>
