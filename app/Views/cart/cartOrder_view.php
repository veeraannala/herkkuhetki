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
            <h4>Kirjaudu sisään</h4>
        </div>
        <div>
            <form action="/" method="post">
                <div class="form-group">
                    <label>Sähköposti</label><span class="required">*</span>
                    <input class="form-control" name="username" placeholder="Sähköposti" maxlength="30">
                </div>
                <div class="form-group">
                    <label>Salasana</label><span class="required">*</span>
                    <input class="form-control" name="password" type="password" placeholder="Syötä salasana"
                        maxlength="30">
                </div>
                <div>
                    <button class="btn btn mb-2">Kirjaudu</button>
                </div>
            </form>
        </div>
        <div>
        <?php print("<a href='/cart/custContact/'>Tilaa kirjautumatta</a>")?>
        </div>

    </div>
</div>