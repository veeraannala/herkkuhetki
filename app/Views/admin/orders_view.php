<div class="row mt-3">
    <div class="col-12">
        <h3>Tehdyt tilaukset:</h3>
        <div style="display: flex;">
        <form class="mr-4" style="float:left; width:30%;" method="post" action="<?= site_url('admin/sortbystatus/')?>">
            <div class="form-group" style="margin-bottom: 0rem;">
                <p>Rajaa tilan mukaan:
                <select class="form-control" name="status"></p>
                    <option disabled selected>Valitse tila</option>
                    <option value="ordered">Tilattu</option>
                    <option value="paid">Maksettu</option>
                    <option value="shipped">Toimitettu</option>
                </select>
                <button type="submit" class="btn btn-danger mt-2">Rajaa</button>
            </div>
        </form>
        <form style="float:right; width:30%;" method="post" action="<?= site_url('admin/sortbymonth/')?>">
            <div class="form-group" style="margin-bottom: 0rem;">
                <p>Rajaa kuukauden mukaan:
                <select class="form-control" name="month"></p>
                    <option selected style="display:none">Valitse kuukausi</option>
                    <option value=1>tammikuu</option>
                    <option value=02>helmikuu</option>
                    <option value=03>maaliskuu</option>
                    <option value=04>huhtikuu</option>
                    <option value=05>toukokuu</option>
                    <option value=06>kesäkuu</option>
                    <option value=07>heinäkuu</option>
                    <option value=08>elokuu</option>
                    <option value=09>syyskuu</option>
                    <option value=10>lokakuu</option>
                    <option value=11>marraskuu</option>
                    <option value=12>joulukuu</option>
                </select>
                <button type="submit" class="btn btn-danger mt-2">Rajaa</button>
            </div>
        </form>
        </div>
        </div>
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