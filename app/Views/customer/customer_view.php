<div class="centerminheight customer">
    <?php $validation =  \Config\Services::validation();?>
    <div class="row col">
        <h1 class="pt-3" >Kirjaudu</h1>
    </div>
    <div class="row">
        <div class="col-md-6">
          <?php
            if(isset($registermessage)) { ?>
                <?='<h3 class="registermessage">'.$registermessage.'</h3>';?>
          <?php
          } else { ?>
              <h3>Rekisteröityneet asiakkaat</h3>
          <?php
          }
          ?>
          <hr>
          <div>
          <?=\Config\Services::validation()->listErrors(); ?>
          </div>
          <?php
              if(isset($message)) { ?>
                <?='<h3 class="errormessage">'.$message.'</h3>';?>
          <?php
          }
          ?>
            <form action="<?= site_url('customer/loginCheck/')?>" method="post">
              <div class="form-group row">
                  <label for="inputEmail" class="col-sm-3 col-form-label pr-1">Sähköposti<span class="required">*</span></label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control <?php if ($validation->hasError('email')
                      ||isset($message)) echo 'inputerror'?>" name="email" placeholder="Sähköposti">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Salasana<span class="required">*</span></label>
                  <div class="col-sm-8">
                      <input type="password" class="form-control <?php if ($validation->hasError('password')
                      ||isset($message)) echo 'inputerror'?>" name="password" placeholder="Salasana">
                      <div class="input-group-append">
                          <i class="fa fa-eye input-group-text" id="passwordeye" aria-hidden="true"></i>
                      </div>
                      <div class="feedback">
                       <!-- Tähän validatemessaget jos ehtii. -->
                      </div>
                  </div>
              </div>
              <button class="btn">Kirjaudu sisään</button>
            </form>
        </div>
        <div class="col-md-6">
          <h3>Uudet asiakkaat</h3>
          <hr>
          <p>Luomalla tilin pääset hallinnoimaan ja seuraamaan tilauksiasi.</p>
            <form action="<?=site_url('customer/register')?>" method="post">
              <button class="btn mb-2" href="">Luo tili</button>
            </form>
        </div>
    </div>
</div>
