<div>
    <form class="centerminheight row pt-3 pb-3 " method="post" action="<?= site_url('cart/saveOrder/')?>">
        <div class="col-md-6">
            <div>

                <table class="table table-striped table-sm">
                    <tr>
                        <th>Tuote</th>
                        <th>Määrä</th>
                        <th>Hinta yhteensä</th>
                    </tr>
                    <?php
            $order = array();
            $sum = 0;
            foreach ($basketproducts as $product):
                $amount = 0;
                foreach ($_SESSION['basket'] as $key => $value):
                    if ($value == $product['id']) {
                        $amount++;
                        $sum += $product['price'];
                    }
                
                endforeach;
            ?>
                    <tr>
                        <td><?=$product['name']?></th>
                        <td><?=$amount?></th>
                        <td><?=$product['price'] * $amount?> €</th>

                    </tr>
                    <?php
    
            $order[$product['id']] = $amount;
            endforeach;
            $_SESSION['order'] = $order;
            ?>
                    <tr>
                        <th>Postikulut</th>
                        <th></th>
                        <td id="post">5.90</td>

                    </tr>
                    <script type="text/javascript">
                    <?php
                    echo "var phpsum = '{$sum}';" ?>
                    </script>
                    <tr>
                        <th>Summa yhteensä</th>
                        <th></th>
                        <th id="sum"><?php printf("%.2f", ($sum+5.9));?> €</th>
                    </tr>
                </table>
            </div>
            <div class="mt-5">

                <h4 class="col-form-label col-12 pt-0 ">Valitse toimitustapa</h4>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="delivery" id="deliveryP" value="P" checked>
                        <label class="form-check-label" for="deliveryP">
                            Postitse
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="delivery" id="deliveryN" value="N">
                        <label class="form-check-label" for="deliveryN">
                            Nouto varastolta
                        </label>
                    </div>
                </div>

            </div>
            <div class="mt-3">

                <h4 class="col-form-label col-12 pt-0 ">Valitse maksutapa</h4>
                <div class="col-12">
                    <select class="form-control" id="payment" name="payment">
                        <option name="paymethod" value="klarna">Klarna</option>
                        <option name="paymethod" value="bank">Verkkopankki</option>
                        <option name="paymethod" value="credit">Luottokortti</option>
                        <option name="paymethod" value="mobilepay">Mobilepay</option>
                    </select>
                </div>


            </div>
        </div>

        <div class="col-6">
            <?php
                if (isset($ordererror)) {
                    ?>
            <p class="errormessage"><?=$ordererror?></p>
            <?php
                } 
            ?>
            <?php if (!isset($_SESSION['customer'])) {?>
            <div>
                <?=\Config\Services::validation()->listErrors(); ?>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname">Etunimi</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Etunimi"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Sukunimi</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Sukunimi"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="email">Sähköpostiosoite</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Sähköpostiosoite"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="phone">Puhelinnumero</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Puhelinnumero"
                        required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="address">Osoite</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Osoite" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="postcode">Postinumero</label>
                    <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postinumero"
                        required>
                </div>
                <div class="form-group col-md-8">
                    <label for="town">Postitoimipaikka</label>
                    <input type="text" class="form-control" id="town" name="town" placeholder="Postitoimipaikka"
                        required>
                </div>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input register" type="checkbox" name="register" id="register" value="1">
                <label class="form-check-label" for="register">Rekisteröidy</label>
            </div>
            <div class="form-row">
                <div class="not_visible form-group col-12" id="passwordshow">
                    <div class="form-group col-md-8">
                        <label for="password">Salasana</label>
                        <div class="input-group">
                        <input class="form-control" name="password" id="password" type="password" placeholder="Syötä salasana"
                            maxlength="30">
                        <div class="input-group-append">
                            <i class="fa fa-eye input-group-text" id="passwordeye" aria-hidden="true"></i>
                        </div>
                    </div>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="passconfirm">Varmista salasana</label>
                        <div class="input-group">
                        <input type="password" class="form-control" id="passconfirm" name="passconfirm"
                            placeholder="Salasana">
                            <div class="input-group-append">
                            <i class="fa fa-eye input-group-text" id="passconfeye" aria-hidden="true"></i>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-12">
                    <button type="submit" class="not_visible btn float-right" id="regOrder">Rekisteröidy ja
                        tilaa</button>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn float-right" id="order">Tilaa tuotteet</button>
                </div>
            </div>
            <?php } else { ?>

            <?php 
                $customer = ($_SESSION['customer']); 
                $customer[0];
                foreach ($customers as $cust):
                    if ($cust['id'] === $customer[0]) {                
                ?>


            <div class="form-row">
                <div class="form-group col-md-12">
                    <p>Nimi: <?=$cust['firstname']?> <?=$cust['lastname']?></p>
                    <p>Sähköpostiosoite: <?=$cust['email']?></p>
                    <p>Puhelinnumero: <?=$cust['phone']?></p>
                    <p>Osoite: <?=$cust['address']?>, <?=$cust['postcode']?> <?=$cust['town']?></p>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input updateCustInfo" type="checkbox" name="updateCustInfo" id="updateCustInfo" value="1">
                    <label class="form-check-label" for="updateCustInfo">Muuta yhteystietoja</label>
                </div>


            </div>
            <div class="not_visible" id="updateCustForm">

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">Etunimi</label>
                        <input type="text" class="form-control" id="firstname" name="firstname"
                            value="<?=$cust['firstname']?>" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">Sukunimi</label>
                        <input type="text" class="form-control" id="lastname" name="lastname"
                            value="<?=$cust['lastname']?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="email">Sähköpostiosoite</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?=$cust['email']?>"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="phone">Puhelinnumero</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?=$cust['phone']?>"
                            required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="address">Osoite</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="<?=$cust['address']?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="postcode">Postinumero</label>
                        <input type="text" class="form-control" id="postcode" name="postcode"
                            value="<?=$cust['postcode']?>" required>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="town">Postitoimipaikka</label>
                        <input type="text" class="form-control" id="town" name="town" value="<?=$cust['town']?>"
                            required>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <button type="submit" class="btn float-right" id="order">Tilaa tuotteet</button>
                </div>
            </div>
            <?php 
                }
            endforeach;
            } ?>
        </div>
    </form>
</div>