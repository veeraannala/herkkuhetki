<div class="centerminheight2">
<?php
$i = 0;
foreach ($sortedorderbymonth as $sortedmonthorder) {
?>
<h2>Kuukauden 
<?php
    if ($sortedmonthorder['MONTH(orderDate)'] == 1) {
        $sortedmonthorder['MONTH(orderDate)'] = 'tammikuu';
    }
    if ($sortedmonthorder['MONTH(orderDate)'] == 2) {
        $sortedmonthorder['MONTH(orderDate)'] = 'helmikuu';
    }
    if ($sortedmonthorder['MONTH(orderDate)'] === 3) {
        $sortedmonthorder['MONTH(orderDate)'] = 'maaliskuu';
    }
    if ($sortedmonthorder['MONTH(orderDate)'] == 4) {
        $sortedmonthorder['MONTH(orderDate)'] = 'huhtikuu';
    }
    if ($sortedmonthorder['MONTH(orderDate)'] == 5) {
        $sortedmonthorder['MONTH(orderDate)'] = 'toukokuu';
    }
    if ($sortedmonthorder['MONTH(orderDate)'] == 6) {
        $sortedmonthorder['MONTH(orderDate)'] = 'kesäkuu';
    }
    if ($sortedmonthorder['MONTH(orderDate)'] == 7) {
        $sortedmonthorder['MONTH(orderDate)'] = 'heinäkuu';
    }
    if ($sortedmonthorder['MONTH(orderDate)'] == 8) {
        $sortedmonthorder['MONTH(orderDate)'] = 'elokuu';
    }
    if ($sortedmonthorder['MONTH(orderDate)'] == 9) {
        $sortedmonthorder['MONTH(orderDate)'] = 'syyskuu';
    }
    if ($sortedmonthorder['MONTH(orderDate)'] == 10) {
        $sortedmonthorder['MONTH(orderDate)'] = 'lokakuu';
    }
    if ($sortedmonthorder['MONTH(orderDate)'] == 11) {
        $sortedmonthorder['MONTH(orderDate)'] = 'marraskuu';
    }
    if ($sortedmonthorder['MONTH(orderDate)'] == 12) {
        $sortedmonthorder['MONTH(orderDate)'] = 'joulukuu';
    }
?><?= $sortedmonthorder['MONTH(orderDate)'] ?> tilaukset:</h2>
<?php
if (++$i == 1) break; } ?>
<table class="table table-striped table-sm">
        <tr>
            <th>Etunimi</th>
            <th>Sukunimi</th>
            <th>Tilauspäivämäärä</th>
            <th>Tila</th>
            <th></th>
            <th></th>
        </tr>
            
        <?php foreach ($sortedorderbymonth as $sortedmonthorder): 
            ?>
                <tr>
                <td class="m-3"><?=$sortedmonthorder['firstname'] ?></td>
                    <td class="m-3"><?=$sortedmonthorder['lastname'] ?></td>
                    <td class="m-3"><?=$sortedmonthorder['orderDate'] ?></td>
                    <td class="m-3"><?php
                    if ($sortedmonthorder['status'] === 'shipped') {
                        $sortedmonthorder['status'] = 'Toimitettu';
                    }
                    if ($sortedmonthorder['status'] === 'ordered') {
                        $sortedmonthorder['status'] = 'Tilattu';
                    }
                    if ($sortedmonthorder['status'] === 'paid') {
                        $sortedmonthorder['status'] = 'Maksettu';
                    }
                    ?><?=$sortedmonthorder['status'] ?></td>
                    <td class="m-3"><?= anchor('admin/showOrder/' . $sortedmonthorder['id'], ' <button>Näytä tilaus</button>')?></td>
                    <td class="m-3"><?= anchor('admin/updateStatus/' . $sortedmonthorder['id'], ' <button>Muokkaa tilaa</button>')?></td>
                </tr>            
                <?php endforeach; ?>
        </table>
        <form method="post" action="<?= site_url('admin/showOrders/')?>">
        <button class="btn btn-danger">Takaisin</button>
        </form>
    </div>