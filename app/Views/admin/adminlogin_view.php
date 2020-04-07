<div class="row">
    <div class="col-md-4">
            <div>
            <?=\Config\Services::validation()->listErrors(); ?>
            <?php
            if(isset($message)) {
                echo $message;
            }
            ?>
            </div>
            <form action="/admin/admincheck" method="post">
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
            <div><button class="btn btn mb-2">Kirjaudu Adminina</button>
            </div>
            <form action="/admin/admincheck" method="post">
            <div><?= anchor('admin/adminregister','Rekisteröi admin') ?>
            </div>
        
    </div>   

</div>