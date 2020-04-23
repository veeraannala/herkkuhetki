<div>
    <?php
$i = 0;
$delivery= null;
foreach ($orderdetails as $orderdetail) {
    $delivery= $orderdetail['delivery'];
?>
    <h3 class="pt-3">Lisätietoja tilauksesta</h3>
    <p>Tilausnumero: <?=$orderdetail['id'] ?></p>
    <?php
      if (++$i == 1) break;
    } ?>
    <div class="row">
        <div class="col-md-4 col-sm-12" style="padding-right: 0px;">
            <table class="table table-striped table-sm">
                <?php
            $i = 0;
            foreach ($orderdetails as $orderdetail) {
            ?>
                <tr>
                    <td>Nimi: </td>
                    <td><?=$orderdetail['firstname'] ?> <?=$orderdetail['lastname'] ?></td>
                </tr>
                <tr>
                    <td>Osoite: </td>
                    <td><?=$orderdetail['address'] ?></td>
                </tr>
                <tr>
                    <td>Postinumero: </td>
                    <td><?=$orderdetail['postcode'] ?></td>
                </tr>
                <tr>
                    <td>Kaupunki: </td>
                    <td><?=$orderdetail['town'] ?></td>
                </tr>
                <tr>
                    <td>Sähköpostiosoite: </td>
                    <td><a href="mailto:<?=$orderdetail['email'] ?>" target="_top"><?=$orderdetail['email'] ?></a></td>
                </tr>
                <tr>
                    <td>Puhelinnumero: </td>
                    <td><?=$orderdetail['phone'] ?></td>
                </tr>
                <?php
              if (++$i == 1) break;
              } ?>
            </table>
        </div>
        <div class="col-md-8 col-sm-12" style="padding-left: 0px;">
            <table class="table table-striped table-sm ordertable">
                <th>Tuote</th>
                <th>Määrä</th>
                <th>Hinta</th>
                <?php
        $total = 0;
        foreach ($orderdetails as $orderdetail):
        ?>
                <tr>
                    <td><?=$orderdetail['name'] ?></td>
                    <td><?=$orderdetail['määrä'] . " x " .$orderdetail['type'] ?></td>
                    <td><?php $yhteensä =  $orderdetail['price'] * $orderdetail['määrä']?><?=$yhteensä?>€</td>
                </tr>
                <?php
        $total += $orderdetail['määrä'] * $orderdetail['price'];
     endforeach;?>

                <tr>
                    <?php if($delivery === 'P') { ?>
                    <th>Postikulut</th>
                    <td> <?php $total += 5.9; ?></td>
                    <td>5.90€</td>
                    <?php } else {?>
                    <th>Nouto varastolta</th>
                    <td></td>
                    <td></td>
                    <?php } ?>
                </tr>

            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3 class="float-right">Tilauksen loppusumma: <?php echo number_format($total,2)?>€</h3>
        </div>
        <div class="col-12">
            <form method="post" action="<?= site_url('/Customer/customerAccount')?>">
                <button class="float-right btn btn-danger mb-2">Takaisin</button>
            </form>
        </div>
    </div>
</div>