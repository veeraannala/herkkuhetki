<div class="row">
   
    <form action="/admin/adminregister" method="post">
    <?=\Config\Services::validation()->listErrors(); ?>
        <div>
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
            <div class="form-group col">
                <label>Salasana uudestaan</label>
                <input class="form-control"
                name="pass_confirm" type="password"
                placeholder="Syötä salasana uudestaan"
                maxlength="30">
            </div>
            
            <div class="col"><button class="btn btn-danger mb-2">rekisteröidy</button></div>
        </div>
            
            
        
    </form>
</div>