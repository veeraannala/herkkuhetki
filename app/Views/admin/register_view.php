<div class="row">
    <div class="col-md-4">
            <div>
            <?=\Config\Services::validation()->listErrors(); ?>
            </div>
        <form action="/admin/adminRegistration" method="post">
            <div class="form-group">
                <label>Adminkäyttäjä</label>
                <input class="form-control"
                name="username"
                placeholder="Syötä adminkäyttäjä"
                maxlength="30">
            </div>
            <div class="form-group">
                <label>Salasana</label>
                <input class="form-control"
                name="password"
                type="password"
                placeholder="Syötä salasana"
                maxlength="30">
            </div>
            <div class="form-group">
                <label>Salasana uudestaan</label>
                <input class="form-control"
                name="passconfirm" type="password"
                placeholder="Syötä salasana uudestaan"
                maxlength="30">
            </div>
            <div class="col"><button class="btn btn mb-2">rekisteröidy</button>
            </div>
        </form>
    </div>
</div>