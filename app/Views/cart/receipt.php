<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>

<body>
    <div class="container pt-3">
        <?php
        $i = 0;
        $delivery= null;
        foreach ($orderdetails as $orderdetail) {
            $delivery= $orderdetail['delivery'];
        ?>
        <h3>Kiitos ostoksistasi, <?=$orderdetail['firstname']?>
            <h3 class="pt-3">Kuitti</h3>
            <p>Tilausnumero: <?=$orderdetail['id'] ?></p>
            <?php
                if (++$i == 1) break;
                } ?>
            <div class="row">
                <div class="col-4">
                    <table class="table table-sm">
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
                            <td>S??hk??postiosoite: </td>
                            <td><a href="mailto:<?=$orderdetail['email'] ?>"
                                    target="_top"><?=$orderdetail['email'] ?></a></td>
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
            </div>
            <div class="row pt-3">
                <div class="col-8">
                    <table class="table table-sm">
                        <th>Tuote</th>
                        <th>M????r??</th>
                        <th>Hinta</th>
                        <?php
                                $total = 0;
                                foreach ($orderdetails as $orderdetail):
                                ?>
                        <tr>
                            <td><?=$orderdetail['name'] ?></td>
                            <td><?=$orderdetail['m????r??'] . " x " .$orderdetail['type'] ?></td>
                            <td><?php $yhteens?? =  $orderdetail['price'] * $orderdetail['m????r??']?><?=$yhteens???>???
                            </td>
                        </tr>
                        <?php
                                $total += $orderdetail['m????r??'] * $orderdetail['price'];
                            endforeach;?>
                        <tr>
                            <?php if($delivery === 'P') { ?>
                            <th>Postikulut</th>
                            <td> <?php $total += 5.9; ?></td>
                            <td>5.90???</td>
                            <?php } else {?>
                            <th>Nouto varastolta</th>
                            <td></td>
                            <td></td>
                            <?php } ?>
                        </tr>
                    </table>
                </div>
                <div class="col-8">
                    <h3>Maksettu: <?php echo number_format($total,2)?>???</h3>
                </div>

            </div>

            <div class="pt-3 col-8">
                <?php if($delivery === 'P') { ?>
                <p>Tuotteenne postitetaan tilausta seuraavana arkip??iv??n??. L??het??mme s??hk??postiinne viestin, kun tilaus
                    on pakattu ja siirretty postin kuljetettavaksi.</p>
                <?php } else {?>
                <p>K??sittelemme tilauksenne ensimm??isen?? tilausta seuraavana arkip??iv??n??. Saatte s??hk??postiinne viestin,
                    kun tilaus on noudettavissa varastoltamme.</p>
                <?php } ?>
                <p>Kiitos tilauksestasi, tervetuloa uudelleen!</p>
            </div>
    </div>


</body>

</html>