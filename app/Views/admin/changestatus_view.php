<div class="row">
    <div class="col">
    <?php
    foreach ($orderstatus as $order): 
    ?>
        

        <?php
        if ($order['id'] === $id) {
        ?>
        <h3 class="mt-3 mb-3">Muokkaa tilauksen tila: <?php
                    if ($order['status'] === 'shipped') {
                        $order['status'] = 'Toimitettu';
                    }
                    if ($order['status'] === 'ordered') {
                        $order['status'] = 'Tilattu';
                    }
                    if ($order['status'] === 'paid') {
                        $order['status'] = 'Maksettu';
                    }
                    ?><?=$order['status']?></h3>
        <div class="col-5">
            <form method="post" action="<?= site_url('admin/updatestat')?>" class="mb-5">
            <input type="hidden" name="id" value="<?=$order['id']?>">
            <div class="form-group">
                <label for="newstatus">Valitse uusi tila:</label>
                <select class="form-control" name="newstatus"> 
                    <option value="shipped">Toimitettu</option>
                    <option value="ordered">Tilattu</option>
                    <option value="paid">Maksettu</option>
                </select>
            </div>
                <button>Muokkaa</button>
                <?php } 
            endforeach; ?>

            </form>
        </div>
    </div>
</div>
