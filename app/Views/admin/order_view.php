<div class="row">
    <div class="col">
    <h1>Tehdyt tilaukset:</h1>
    <?php print_r($orderdetails) ?>
        <table class="table table-striped table-sm">
        <?php
        $total = 0;
        foreach ($orderdetails as $orderdetail): 
        ?>
                <tr>
                <td class="m-3"><?=$orderdetail['name'] ?></td>
                <td class="m-3"><?=$orderdetail['määrä'] .'kpl' ?></td>
                <td class="m-3"><?=$orderdetail['Hinta yhteensä'] ?></td>

                </tr>        
        <?php
        $total += $orderdetail['määrä'] * $orderdetail['Hinta yhteensä'];
     endforeach;?>
                <tr>
                    <th>Loppsumma: <?php echo number_format($total,2)?>€</th>
                </tr>     
        </table>
    </div>
</div>