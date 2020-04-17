
<div class="row">
    <div class="col-12">
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
        <div style="display: flex;">
        <form class="mr-4" style="float:left; width:20%;" method="post" action="<?= site_url('admin/updatestat')?>">
        <input type="hidden" name="id" value="<?=$order['id']?>">
            <div class="form-group">
            <label for="newstatus">Valitse uusi tila:</label>
                <select class="form-control" name="newstatus"> 
                    <option value="shipped">Toimitettu</option>
                    <option value="ordered">Tilattu</option>
                    <option value="paid">Maksettu</option>
                </select>
                <button type="submit" class="btn btn-danger mt-1">Muokkaa</button>
                <?php } 
            endforeach; ?>
            </div>
        </form>
        <form method="post" action="<?= site_url('admin/showOrders/')?>">
            <div class="form-group">
            <br>
            <br>
            <br>
        <button style="position:absolute; left: 107px; bottom:16.5px;" class="btn btn-danger mt-1">Takaisin</button>
            </div>
        </form>
        </div>
        </div>
        </div>