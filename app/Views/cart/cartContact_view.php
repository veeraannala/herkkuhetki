<div class="row mt-5 mb-5">
    <div class="col-md-6">
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
            if ($value == $product['id']){
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
                <th>Summa yhteensä</th>
                <th></th>
                <th><?php printf("%.2f", $sum);?> €</th>

            </tr>
        </table>
    </div>
    <div class="col-6">
        <div>
            <?=\Config\Services::validation()->listErrors(); ?>
        </div>
        <form method="post" action="<?= site_url('cart/collectInfo/')?>">
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
                    <input type="password" class="form-control" id="password" name="password" placeholder="Salasana">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="passconfirm">Varmista salasana</label>
                        <input type="password" class="form-control" id="passconfirm" name="passconfirm"
                            placeholder="Salasana">
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
        </form>
    </div>
</div>