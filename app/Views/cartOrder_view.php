<div class="row mt-5 mb-5">
    <div class="col-md-6">
        <table  class="table table-striped table-sm">
        <tr>
        <th>Tuote</th>
        <th>Määrä</th>
        <th>Hinta yhteensä</th>
        </tr>
    <?php
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
        <td><?=$product['price'] * $amount?></th>
        
      </tr>
    <?php    
    

    endforeach; ?>
    <tr>
        <th>Summa yhteensä</th>
        <th></th>
        <td><?=$sum?></td>
        
      </tr>
    </table>
    </div>
    <div class="col-6">
        <form method="post" action="<?= site_url('cart/order/')?>">
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
                <div class="form-group col-md-12">
                    <label for="custEmail">Sähköpostiosoite</label>
                    <input type="email" class="form-control" id="custEmail" name="custEmail"
                        placeholder="Sähköpostiosoite" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
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
                    <label for="lastname">Postitoimipaikka</label>
                    <input type="text" class="form-control" id="postaddress" name="postaddress"
                        placeholder="Postitoimipaikka" required>
                </div>
            </div>
            <div class="form-row float-right">
                <button type="submit" class="btn">Tilaa tuotteet</button>
            </div>
        </form>
    </div>
</div>