<div class="centerminheight customer">
    <div class="row">
        <div class="col-md-6">
        <h1>Hei <?=$userdata['firstname']?></h1>
        </div>
        <div class="col-md-6">
        <?php if(isset($message)) { ?>
            <?='<h3 class="registermessage">'.$message.'</h3>';?>
        <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <hr>
            <div class="card customercard mb-3 col-12">
                <div class="card-body text-dark ">
                    <?php if(!isset($infomessage)) { ?>
                    <h5 class="card-title">Yhteystietosi</h5>
                    <?php } else { ?>
                    <?='<h5 class="card-title registermessage">Yhteystietosi '.$infomessage.'</h5>'?>
                    <?php } ?>
                    <p>Nimi: <?=$userdata['firstname']. ' '. $userdata['lastname']?></p>
                    <p>Sähköposti: <?=$userdata['email']?></p>
                    <p>Osoite: <?=$userdata['address']?></p>
                    <p>Postinumero: <?=$userdata['postcode']?></p>
                    <p>Postitoimipaikka: <?=$userdata['town']?></p>
                    <p>Puhelinnumero: <?=$userdata['phone']?></p>
                    <form action="<?= site_url('customer/customerEdit/')?>">
                    <button class="btn mb-2">Muuta yhteystietojasi</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <hr>
            <div class="card customercard mb-3 col-12">
                <div class="card-body text-dark ">
                    <h5 class="card-title">Edelliset tilauksesi</h5>
                    <table class="table table-striped table-sm">
                        <tr>
                            <th>Tilauspäivämäärä</th>
                            <th>Tila</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <?php foreach ($orders as $order): 

                        if ($order['customer_id'] === $userdata['id']) {
                            ?>
                        <tr>

                            <td class="m-3"><?=$order['orderDate'] ?></td>
                            <td class="m-3">
                            <?php
                            if ($order['status'] === 'shipped') {
                                 $order['status'] = 'Toimitettu';
                            }
                            if ($order['status'] === 'ordered') {
                                $order['status'] = 'Tilattu';
                            }
                            if ($order['status'] === 'paid') {
                                $order['status'] = 'Maksettu';
                            } ?><?=$order['status'] ?></td>
                            <td class="m-3">
                                <?= anchor('customer/showOrder/' . $order['id'], ' <button>Näytä tilaus</button>')?></td>
                           
                        </tr>
                        <?php
                        }
                    endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


