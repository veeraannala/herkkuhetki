<div class="mt-3 centerminheight customer">
    <div class="row col">
        <h1>Kirjaudu</h1>
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
                      <input type="text" class="form-control" name="email">
                  </div>
              </div>
              <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-3 col-form-label">Salasana<span class="required">*</span></label>
                  <div class="col-sm-8">
                      <input type="password" class="form-control" name="password">
                  </div>
              </div>
              <button class="btn">Kirjaudu sisään</button>
            </form>
        </div>
        <div class="col-md-6">
          <h3>Uudet asiakkaat</h3>
          <hr>
          <p>Luomalla tilin pääset hallinnoimaan ja seuraamaan tilauksiasi</p>
            <form action="<?=site_url('customer/register')?>" method="post">
              <button class="btn" href="">Luo tili</button>
            </form>
        </div>
    </div>
</div>
