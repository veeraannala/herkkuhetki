<div class="row mt-3">
    <div class="col-md-4">
            <div>
            <?=\Config\Services::validation()->listErrors(); ?>
            </div>
            <?php
            if (isset($message)) { ?>
            <p class="errormessage"><?=$message?></p>
            <?php
            } 
            ?> 
            <form action="/admin/admincheck" method="post">
                <div class="form-group">
                    <label>Adminkäyttäjä</label><span class="required">*</span>
                    <input class="form-control"
                    name="username"
                    placeholder="Syötä adminkäyttäjä"
                    maxlength="30">
                </div>
                <div class="form-group">
                    <label>Salasana</label><span class="required">*</span>
                    <input class="form-control"
                    name="password"
                    type="password"
                    placeholder="Syötä salasana"
                    maxlength="30">
                </div>
                <div>
                <button class="btn btn mb-2">Kirjaudu Adminina</button>
                </div>
            <form action="/admin/admincheck" method="post">
        </div>
        
    </div>   

</div>