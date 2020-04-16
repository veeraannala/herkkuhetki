<div class="row">
    <div class="col">
        <h1>Tehdyt tilaukset:</h1>
        <form method="post" action="<?= site_url('admin/sortbystatus/')?>">
        <div class="row">
            <div class="form-group col-3 mt-2" style="margin-bottom: 0rem;">
                <p>Rajaa tilan mukaan:
                <select class="form-control" id="limitbystatus" name="status"></p>
                    <option disabled selected>Valitse tila</option>
                    <option value="ordered">Tilattu</option>
                    <option value="paid">Maksettu</option>
                    <option value="shipped">Toimitettu</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-danger mb-2">Rajaa</button>
        </form>
        <table class="table table-striped table-sm">
        <tr>
            <th>Etunimi</th>
            <th>Sukunimi</th>
            <th>Tilauspäivämäärä</th>
            <th>Tila</th>
            <th></th>
            <th></th>
        </tr>
            
        <?php foreach ($orders as $order): 
            ?>
                <tr>
                <td class="m-3"><?=$order['firstname'] ?></td>
                    <td class="m-3"><?=$order['lastname'] ?></td>
                    <td class="m-3"><?=$order['orderDate'] ?></td>
                    <td class="m-3"><?php
                    if ($order['status'] === 'shipped') {
                        $order['status'] = 'Toimitettu';
                    }
                    if ($order['status'] === 'ordered') {
                        $order['status'] = 'Tilattu';
                    }
                    if ($order['status'] === 'paid') {
                        $order['status'] = 'Maksettu';
                    }
                    ?><?=$order['status'] ?></td>
                    <td class="m-3"><?= anchor('admin/showOrder/' . $order['id'], ' <button>Näytä tilaus</button>')?></td>
                    <td class="m-3"><?= anchor('admin/updateStatus/' . $order['id'], ' <button>Muokkaa tilaa</button>')?></td>
                </tr>            
                <?php endforeach; ?>     
        </table>
    </div>
</div>