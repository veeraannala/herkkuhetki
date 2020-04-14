<div class="cartminheight">
    <div class="row col">
        <h1>Kirjaudu</h1>
        
    </div> 
    <div class="row">
        <div class="col-md-6">
        <h3>Rekisteröityneet asiakkaat</h3>
        <hr>
        <form action="" method="post">
            <div class="form-group row">
                <label for="inputEmail" class="col-sm-3 col-form-label pr-1">Käyttäjänimi <span class="required">*</span></label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="username">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Salasana <span class="required">*</span></label>
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
        <form action="<?=site_url('login/register')?>" method="post">
        <button class="btn" href="">Luo tili</button>
        </form>
        </div>

        
    </div>
</div>