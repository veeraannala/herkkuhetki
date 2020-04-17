<div class="centerminheight2">
<table class="table table-striped table-sm">
        <tr>
            <th>Etunimi</th>
            <th>Sukunimi</th>
            <th>Tilauspäivämäärä</th>
            <th>Tila</th>
            <th></th>
            <th></th>
        </tr>
            
        <?php foreach ($sortedorders as $sortedorder): 
            ?>
                <tr>
                <td class="m-3"><?=$sortedorder['firstname'] ?></td>
                    <td class="m-3"><?=$sortedorder['lastname'] ?></td>
                    <td class="m-3"><?=$sortedorder['orderDate'] ?></td>
                    <td class="m-3"><?php
                    if ($sortedorder['status'] === 'shipped') {
                        $sortedorder['status'] = 'Toimitettu';
                    }
                    if ($sortedorder['status'] === 'ordered') {
                        $sortedorder['status'] = 'Tilattu';
                    }
                    if ($sortedorder['status'] === 'paid') {
                        $sortedorder['status'] = 'Maksettu';
                    }
                    ?><?=$sortedorder['status'] ?></td>
                    <td class="m-3"><?= anchor('admin/showOrder/' . $sortedorder['id'], ' <button>Näytä tilaus</button>')?></td>
                    <td class="m-3"><?= anchor('admin/updateStatus/' . $sortedorder['id'], ' <button>Muokkaa tilaa</button>')?></td>
                </tr>            
                <?php endforeach; ?>     
        </table>
        <form method="post" action="<?= site_url('admin/showOrders/')?>">
        <button class="btn btn-danger">Takaisin</button>
        </form>
    </div>