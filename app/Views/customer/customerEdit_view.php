<div class="centerminheight customer row">
    
    <div class="col-md-6">
        <h2>Muuta Sähköposti-osoitettasi</h2>
        <hr>
        <div class="row col-12">
        <?php if(isset($emailmessage)) { ?>
            <?='<h3 class="errormessage">'.$emailmessage.'</h3>';?>
        <?php } ?>
        </div>
        <div class="row">
        <?=\Config\Services::validation()->listErrors(); ?>
        </div>
        <form action="<?= site_url('customer/customerEmailUpdate')?>" method="post">
            <div class="row mt-2">
              <div class="col-md-8">
                  <p>Nykyinen sähköpostiosoitteesi on: <?=$userdata['email']?></p>
              </div> 
            </div>
            <div class="form-row mt-2">
                <div class="form-group col-md-8">
                    <label for="email">Uusi Sähköposti<span class="required">*</span></label>
                    <input type="email" class="form-control" name="newemail" placeholder="Sähköposti" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="email">vahvista uusi Sähköposti<span class="required">*</span></label>
                    <input type="email" class="form-control" name="emailconfirm" placeholder="Sähköposti" required>
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
        <div class="row col-12">
        <?php if(isset($message)) { ?>
            <?='<h3 class="errormessage">'.$message.'</h3>';?>
        <?php } ?>
        </div>
        <form action="<?= site_url('customer/customerPasswordUpdate')?>" method="post">
            <div class="form-row">
                <div class="form-group col-md-8 ">
                    <label for="password">Vanha salasana<span class="required">*</span></label>
                    <input type="password" class="form-control" name="oldpassword" placeholder="Salasana" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="password">Uusi salasana<span class="required">*</span></label>
                    <input type="password" class="form-control" name="newpassword" placeholder="Salasana" required>
                </div>
                <div class="form-group col-md-8">
                    <label for="inputPassword4">Vahvista uusi salasana<span class="required">*</span></label>
                    <input type="password" class="form-control" name="passconfirm" placeholder="Vahvista salasana"
                        required>
                </div>
            </div>
            <button type="submit" class="btn btn mb-2">Vahvista</button>
        </form>
    </div>
</div>