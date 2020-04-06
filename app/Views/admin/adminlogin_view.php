<div class="row">
<form action="/admin/admincheck" method="post">

    <div class="col">
    <?=\Config\Services::validation()->listErrors(); ?>
    </div>
        <div class="form-group col">
            <label>Adminkäyttäjä</label>
            <input class="form-control"
            name="username"
            placeholder="Syötä adminkäyttäjä"
            maxlength="30">
        </div>
        <div class="form-group col">
            <label>Salasana</label>
            <input class="form-control"
            name="password"
            type="password"
            placeholder="Syötä salasana"
            maxlength="30">
        </div>
    <div class="col"><button class="btn btn-danger mb-2">Kirjaudu Adminina</button></div>
     <div class="col"><?= anchor('admin/adminregister','Rekisteröi admin') ?></div>
    
    
</form>
</div>